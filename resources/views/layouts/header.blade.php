<nav class="navbar-intop navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand pt-0" href="{{ url('/index') }}">
        <img src="{{asset('images/logo.png')}}" alt="" width="230" height="25">
                </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                @yield('button-navbar')
                @if ($user->admin == 1)
                <li class="nav-item text-navbar"><a class="nav-link" href="{{asset('admin/user')}}">Trang Admin</a></li>
                @endif
                @endauth
            </ul>
            <!-- Right Side Of Navbar -->
            <div class="navbar-nav d-flex">
                <!-- Authentication Links -->
                @guest
                <div class="nav-item mr-2">
                    <a class="text-navbar nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                </div>
                @if (Route::has('register'))
                <div class="nav-item">
                    <a class="text-navbar nav-link" href="{{ route('register') }}">Đăng Ký</a>
                </div>
                @endif
                @else
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-navbar" href="#" role="button"
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
                @endguest
            </div>
        </div>
    </div>
</nav>
@auth
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
                    <img id="avatar" src="{{url('images/users/'.$user->image_path)}}" width="120" height="140">
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
                    <button type="submit" class="btn btn-primary">Cập Nhật Thông Tin</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endauth
@yield('search')
