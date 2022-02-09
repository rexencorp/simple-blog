<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.navbar')

    <div class="container mb-5 pb-5">
        <h1 class="text-center my-5">Latest Posts</h1>
        <div class="row">
            @foreach ($articles as $item)
                <div class="col col-4 mt-3">
                    <div class="card text-center">
                        <div class="card-header">
                            {{ $item->judul }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $item->content }}
                            </p>
                            <a href="{{ route('articles.show',['id'=> $item->id]) }}" class="btn btn-primary">Read more...</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $item->user->name }} || {{ $item->created_at }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- ini pakai react --}}
        <div id="articles" class="row"></div>
    </div>

    <footer class="bg-dark p-2 fixed-bottom">
        <p class="text-center text-white">Copyright &copy; 12 RPL SMKN 10 JAKARTA</p>
    </footer>

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
