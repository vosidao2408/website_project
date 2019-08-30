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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/brands.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Anton|Fira+Sans+Condensed|Crimson+Pro|Noticia+Text:700|Baloo+Bhaina|Roboto:500|Varela+Round&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('layouts.header')
    </header>
    <main>
        <div class="container-fluid">
            <div class="d-flex">
                <div id="boxing" class="col-2 d-none d-md-block"></div>
                @yield('content')
                <div id="boxing" class="col-2 d-none d-md-block"></div>
            </div>
        </div>
    </main>
    <footer>
        <hr style="border-top: 2px solid #ff8c1a">
        <div class="container mb-3">
            <div class="row bg-light">
                <h5 class="mr-5" ><a class="text-decoration-none" style="color:black;" href="#"><i
                            class="fas fa-phone-square fa-lg"></i> <b>LIÊN HỆ</a></h5>
                <h5><a class="text-decoration-none" style="color:black;" href="#"><i
                            class="fab fa-facebook-square fa-lg"></i> <b>FACEBOOK</b></a></h5>
            </div>
        </div>
    </footer>
    @stack('javascript')
    @stack('select2')
    <script>
    </script>

</body>

</html>