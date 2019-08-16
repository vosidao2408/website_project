@extends('layouts.app')

@section('title','Trang cá nhân')

@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="col-md-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thông báo</div>

                <div class="card-body">
                    <h3 class="text-center">Bạn Đã Đăng Nhập Thành Công!</h3>
                    <p class="text-center mt-3">Bạn có thể cần làm những điều dưới đây:</p>
                    <div class="d-flex justify-content-center">
                      <form method="GET" action="{{asset('home/posts/create')}}">
                        <button class="mr-1 btn btn-primary" type="submit">Tạo Bài Viết</button>
                      </form>
                      <form method="GET" action="{{asset('home/user/edit')}}">
                        <button class="ml-1 btn btn-success" type="submit">Bổ Sung Thông Tin Cá Nhân</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
