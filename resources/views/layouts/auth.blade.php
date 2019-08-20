<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/brands.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
</head>

<body>
    <header class="shadow">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"
                    href="{{ url('/index') }}">
                    <strong>BẠN TRỌ WEBSITE</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav d-flex">
                        <!-- Authentication Links -->
                        @guest
                        <div class="nav-item mr-2">
                            <a class=" nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Đăng Ký</a>
                        </div>
                        @endif
                        @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{asset('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Đăng Xuất</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav></header>
    <main class="mt-5">
        <div class="container">
            <div class="d-flex">
                <div class="col-1 d-none d-md-block">{{-- quang cao --}}</div>
                @yield('content')
                <div class="col-1 d-none d-md-block">{{-- quang cao --}}</div>
            </div>
        </div>
    </main>
    <footer>
        <hr style="border-top: 1px solid #8585e0">
        <div class="container mb-3">
            <div class="row bg-light">
                <h5 class="mr-5 text-primary"><a class="text-decoration-none" href="#"><i
                            class="fas fa-phone-square fa-lg"></i> LIÊN HỆ</a></h5>
                <h5 class="text-primary"><a class="text-decoration-none" href="#"><i
                            class="fab fa-facebook-square fa-lg"></i> FACEBOOK</a></h5>
            </div>
        </div>
    </footer>
    <script>
    </script>

</body>

</html>