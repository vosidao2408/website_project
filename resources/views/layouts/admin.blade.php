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
                    <strong>BẠN TRỌ DASHBOARD</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{asset('admin/user')}}">Trang Admin</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav d-flex">
                        <!-- Authentication Links -->
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#information">Thông tin cá
                                    nhân</a>
                                <a class="dropdown-item" href="{{asset('home/user/editpass')}}">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{asset('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Đăng xuất</a>
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
                        <h5 class="modal-title" id="informationLabel">Thông tin cá nhân</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex">
                        <div class="container-img">
                            <img id="avatar" src="{{url('images/'.$user->image_path)}}" alt="No picture here" width="120" height="140">
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
            <div class="d-flex">
                <div class="col-md-2 d-block">
                    @include('admin.layouts.sidebar')
                </div>
                @yield('content')
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