<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/brands.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">   
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
</head>

<body>
    <header class="shadow">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand pt-0" href="{{ url('/admin/user') }}">
                    <img src="{{asset('images/logo-dash.png')}}" alt="" width="270" height="25">
                            </a>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item text-navbar"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
                        <li class="nav-item text-navbar"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
                        <li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('admin/user')}}">Trang Admin</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav d-flex">
                        <!-- Authentication Links -->
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-navbar dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-navbar" href="#" data-toggle="modal" data-target="#information">Thông Tin Cá
                                    Nhân</a>
                                <a class="dropdown-item text-navbar" href="{{asset('home/user/editpass')}}">Đổi Mật Khẩu</a>
                                <a class="dropdown-item text-navbar" href="{{asset('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Đăng Xuất</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="informationLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="informationLabel">Thông Tin Cá Nhân</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex">
                        <div class="container-img">
                            <img id="avatar" src="{{url('images/users/'.$user->image_path)}}" alt="No picture here" width="120" height="140">
                            <div class="overlay">
                                <form action="{{asset('home/avatar')}}" method="GET">
                                    <button class="btn btn-sm btn-light p-1"><i class="fas fa-camera fa-lg"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="ml-2">
                            <p><b>Tên: </b>{{$user->name}}</p>
                            <p><b>Email: </b>{{$user->email}}</p>
                            <p><b>Số điện thoại: </b>{{$user->phone}}</p>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <form method="GET" action="{{asset('home/user/edit')}}">
                            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
</header>
    <main class="mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mb-3">
                    @include('admin.layouts.sidebar')
                </div>
                <div class="col-md-10">
                @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer>
        <hr style="border-top: 1px solid #8585e0">
        <div class="container mb-3">
            <div class="row bg-light">
                <h5 class="ml-2 mr-5 text-primary"><a class="text-decoration-none" href="#"><i
                            class="fas fa-phone-square fa-lg"></i> LIÊN HỆ</a></h5>
                <h5 class="text-primary"><a class="text-decoration-none" href="#"><i
                            class="fab fa-facebook-square fa-lg"></i> FACEBOOK</a></h5>
            </div>
        </div>
    </footer>
    @stack('javascript')
    <script>
    </script>

</body>

</html>
