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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
</head>
<body>
    {{-- Background --}}
    <video autoplay loop muted>
        <source src="{{ asset('video/underwater.mp4') }}" type="video/mp4">
    </video>
    
    <div class="container-fluid">
        {{-- Navbar --}}
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src="{{ asset('img/logo.png') }}" alt="Discode Logo" class="logo">
                    <a class="navbar-brand ms-3" href="/">Discode</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                @if ($content === 'home')
                                    <a class="nav-link menu active" href="/"><i class="fa fa-home"></i> Home</a>
                                @else
                                    <a class="nav-link menu" href="/"><i class="fa fa-home"></i> Home</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if ($content === 'about')
                                    <a class="nav-link menu active" href="/about"><i class="fa fa-info-circle"></i> About</a>
                                @else
                                    <a class="nav-link menu" href="/about"><i class="fa fa-info-circle"></i> About</a>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                @if ($content === 'thread' || $content === 'oldestthread' || $content === 'latestthread' || $content === 'create' || $content === 'edit' || $content === 'editReply' || $content === 'detail')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-sticky-note"></i> Thread</a>
                                @elseif ($content === 'tag' || $content === 'tagDetail' || $content === 'createTag' || $content === 'editTag')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-tag"></i> Tag</a>
                                @elseif ($content === 'user' || $content === 'userDetail' || $content === 'editUser')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> User</a>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-users"></i> Forum</a>
                                @endif
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item menu" href="/thread"><i class="fa fa-sticky-note"></i> Thread</a></li>
                                    <li><a class="dropdown-item menu" href="/tag"><i class="fa fa-tag"></i> Tag</a></li>
                                    <li><a class="dropdown-item menu" href="/user"><i class="fa fa-user"></i> User</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            @guest
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-info" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> {{ __('Register') }}</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> {{ __('Login') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @foreach ($profiles as $profile)
                                            @if (Auth::id() === $profile['user_id'])
                                                @if (!$profile['photo_url'])
                                                    <img src="{{ asset('profile/default.png') }}" class="rounded-circle" width="40" height="40" alt="Profile Picture">
                                                    {{ Auth::user()->name }}
                                                @else
                                                    <img src="{{ asset('profile/' . $profile['photo_url']) }}" class="rounded-circle" width="40" height="40" alt="Profile Picture">
                                                    {{ Auth::user()->name }}
                                                @endif
                                            @endif
                                        @endforeach
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="position: absolute; top: 80px; right: 0">
                                        @if (Auth::user()->name != 'Admin')
                                            <a class="dropdown-item w-75" href="{{url('/user' . '/' . Auth::id())}}">
                                                <i class="fa fa-user"></i> My Profile
                                            </a>
                                            <a class="dropdown-item w-75" href="/mythread">
                                                <i class="fa fa-sticky-note"></i> My Thread
                                            </a>
                                            <a class="dropdown-item w-75" href="/changepassword">
                                            <i class="fa fa-key"></i> Change Pass
                                            </a>
                                        @endif
                                        <a class="dropdown-item w-75" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        {{-- Success Message --}}
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success w-50 m-auto my-3 text-center alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- Content --}}
        @if ($content === 'home')
            @include('home')
            @yield('content')
        @elseif ($content === 'about')
            @include('about')
            @yield('content')
        @elseif ($content === 'login')
            @include('auth.login')
            @yield('content')
        @elseif ($content === 'thread'|| $content === 'oldestthread' || $content === 'latestthread')
            @include('thread.read')
            @yield('content')
        @elseif ($content === 'mythread')
            @include('thread.myread')
            @yield('content')
        @elseif ($content === 'create')
            @include('thread.create')
            @yield('content')
        @elseif ($content === 'edit')
            @include('thread.edit')
            @yield('content')
        @elseif ($content === 'editReply')
            @include('reply.edit')
            @yield('content')
        @elseif ($content === 'detail')
            @include('thread.detail')
            @yield('content')
            @include('reply.read')
            @yield('read')
            @include('reply.create')
            @yield('create')
        @elseif ($content === 'tag')
            @include('tag.read')
            @yield('content')
        @elseif ($content === 'tagDetail')
            @include('tag.detail')
            @yield('content')
        @elseif ($content === 'createTag')
            @include('tag.create')
            @yield('content')
        @elseif ($content === 'editTag')
            @include('tag.edit')
            @yield('content')
        @elseif ($content === 'user')
            @include('user.read')
            @yield('content')
        @elseif ($content === 'userDetail')
            @include('user.detail')
            @yield('content')
        @elseif ($content === 'editUser')
            @include('user.edit')
            @yield('content')
        @endif

        {{-- Footer --}}
        <div class="row">
            <div class="footer text-center text-white mt-5 p-3">
                <div class="row mb-3">
                    <div class="col-4">
                        <a href="/thread" class="text-info text-decoration-none"><i class="fa fa-sticky-note"></i> Thread</a>
                    </div>
                    <div class="col-4">
                        <a href="/tag" class="text-info text-decoration-none"><i class="fa fa-tag"></i> Tag</a>
                    </div>
                    <div class="col-4">
                        <a href="/user" class="text-info text-decoration-none"><i class="fa fa-user"></i> User</a>
                    </div>
                </div>
    
                <hr>
    
                <div class="row mb-3">
                    <div class="col-4">
                        <a href="https://www.instagram.com" class="text-primary text-decoration-none"><i class="fab fa-instagram"></i> Follow Us</a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.youtube.com" class="text-danger text-decoration-none"><i class="fab fa-youtube"></i> Subscribe Us</a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.whatsapp.com" class="text-success text-decoration-none"><i class="fab fa-whatsapp"></i> Chat Us</a>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col">
                        <footer id="copyright" class="text-info"></footer>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Up Button --}}
        <button id="upButton" class="btn btn-primary mb-3" style="position: fixed; bottom: 0; right: 20px; display: none"><i class="fa fa-arrow-up"></i></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>