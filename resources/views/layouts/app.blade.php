<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('css')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/brands.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <script src="{{ asset('js/boostrap.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Anton|Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
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

<body>
    <header class="shadow">
        @include('layouts.header')</header>
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
    @stack('javascript')
    @stack('ckeditor')
    @stack('select2')
    <script>
    </script>

</body>

</html>
