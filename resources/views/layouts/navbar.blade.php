<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @foreach ($pages as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.show',['id'=> $item->id]) }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @guest
            <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
            <a href="/register" class="btn btn-outline-danger">Register</a>
            @endguest
            @auth
            <p class="text-white">{{ Auth::user()->name }}</p>
            @endauth
        </div>
    </div>
</nav>
