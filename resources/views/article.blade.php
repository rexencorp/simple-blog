@php
	$inputReply = [
		[
			'id'    => 'game-name',
			'label' => 'Game Name:',
			'name'	=> 'name'
		],
		[
			'id' 		=> 'game-icon',
			'label' => 'Game Icon:',
			'name'	=> 'icon',
			'type' 	=> 'file'
		],
		[
			'id' 		=> 'game-base-price',
			'label' => 'Base Price:',
			'name'	=> 'base_price',
			'type' 	=> 'number'
		],
	];
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Rexblog</title>
</head>

<body>

    @include('layouts.navbar')

    <div class="container">
        <h1>{{ $article->judul }}</h1>
        <h5>{{ $article->created_at }}</h5>
        <p>{{ $article->content }}</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div id="comment-list" data-artikel-id="{{ $article->id }}">

        </div>
        @auth
        <form method="POST" action="{{ route('comments.create') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Komentar</label>
                <textarea name="komentar" id="" class="form-control"></textarea>
                <input type="hidden" name="comment_id" value="">
                <input type="hidden" name="artikel_id" value="{{ $article->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endauth

        @foreach ($article->comments as $comment)
            @if(!$comment->comment_id)
                <div class="modal fade" id="addReply-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Reply {{ $comment->user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('comments.create') }}" method="POST">
                            @csrf
                        <div class="modal-body">
                            <textarea name="komentar" id="" class="form-control"></textarea>
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <input type="hidden" name="artikel_id" value="{{ $article->id }}">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                @auth
                @if($comment->status == 2 || $comment->user->id == Auth::user()->id)
                <div class="card mt-4 @if($comment->status == 1) bg-warning @endif">
                    <div class="card-body">
                        <h5>{{ $comment->user->name }}</h5>
                        <p>{{ $comment->comment }}</p>
                        @auth
                        <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#addReply-{{ $comment->id }}">Reply</button>
                        @endauth
                    </div>
                </div>
                @endif
                @endauth

                @guest
                @if($comment->status == 2)
                    <div class="card mt-4 @if($comment->status == 1) bg-warning @endif">
                        <div class="card-body">
                            <h5>{{ $comment->user->name }}</h5>
                            <p>{{ $comment->comment }}</p>
                            @auth
                            <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#addReply-{{ $comment->id }}">Reply</button>
                            @endauth
                        </div>
                    </div>
                @endif
                @endguest

                <div class="ms-4">
                    @foreach ($comment->comments as $reply)
                        <div class="modal fade" id="addReply2-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Reply {{ $reply->user->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('comments.create') }}" method="POST">
                                    @csrf
                                <div class="modal-body">
                                    <textarea name="komentar" id="" class="form-control"></textarea>
                                    <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                    <input type="hidden" name="artikel_id" value="{{ $article->id }}">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <div class="card mt-2 @if($comment->status == 1) bg-warning @endif">
                            <div class="card-body">
                            <h5>{{ $reply->user->name }}</h5>
                            <p>{{ $reply->comment }}</p>
                            @auth
                            <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#addReply2-{{ $comment->id }}">Reply</button>
                            @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

            @endif
        @endforeach
    </div>

    {{-- <footer class="bg-dark p-2 fixed-bottom">
        <p class="text-center text-white">Copyright &copy; 12 RPL SMKN 10 JAKARTA</p>
    </footer> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
