<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('css')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/regdivar.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Anton|Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/regdivar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
    <style>
        .img-background {
            background-image: url("https://images.wallpaperscraft.com/image/art_trees_drawing_minimalism_100903_2560x1600.jpg");
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }

        .opacity-nav {
            opacity: 0.8;
        }
    </style>
    @yield('headcripts')
    @yield('stylesheets')
</head>

<body class="img-background">
    <nav class="navbar sticky-top navbar-expand navbar-dark shadow-sm opacity-nav" style="background-color: #00e600;op">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif" href="{{ url('/home') }}">
                <strong>BẠN TRỌ WEBSITE</strong>
            </a>
            <!-- Left Side Of Navbar -->
            @yield('search')
            <!-- Right Side Of Navbar -->
            <div class="navbar-nav d-flex">
                <!-- Authentication Links -->
                @guest
                <div class="nav-item mr-2">
                    <a class="text-light btn btn-outline-light nav-link" href="{{ route('login') }}">Đăng nhập</a>
                </div>
                @if (Route::has('register'))
                <div class="nav-item">
                    <a class="text-light btn btn-outline-light nav-link" href="{{ route('register') }}">Đăng ký</a>
                </div>
                @endif
                @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @yield('button')
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Đăng xuất</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
        @include('layouts.footer')
    </main>
    @stack('javascript')
    @stack('ckeditor')
    @stack('select2')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
