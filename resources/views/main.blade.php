<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discode</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Background --}}
    <video autoplay loop muted>
        <source src="{{ asset('video/underwater.mp4') }}" type="video/mp4">
    </video>
    
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src="{{ asset('img/logo.png') }}" alt="Discode Logo" class="logo">
                    <a class="navbar-brand ms-3" href="/">Discode</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                @if ($content === 'home')
                                    <a class="nav-link active" href="/">Home</a>
                                @else
                                    <a class="nav-link" href="/">Home</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if ($content === 'about')
                                    <a class="nav-link active" href="/about">About</a>
                                @else
                                    <a class="nav-link" href="/about">About</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if ($content === 'thread')
                                    <a class="nav-link active" href="/thread">Thread</a>
                                @else
                                    <a class="nav-link" href="/thread">Thread</a>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Rating
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Most Popular</a></li>
                                    <li><a class="dropdown-item" href="#">Most Liked</a></li>
                                    <li><a class="dropdown-item" href="#">Newest</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                        </ul>
                        {{-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> --}}
                    </div>
                </div>
            </nav>
        </div>

        @if ($content === 'home')
            @include('home')
            @yield('content')
        @elseif ($content === 'about')
            @include('about')
            @yield('content')
        @else
            @include('thread')
            @yield('content')
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>