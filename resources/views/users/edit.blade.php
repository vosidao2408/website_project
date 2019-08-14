@extends('layouts.app')

@section('title','Edit user')



@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<style>
    .col-1.d-none {
        display: none!important;
    }
</style>
@endsection

@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('btn-post')
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{asset('')}}">Home</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{asset('users/')}}">User</a>
    </li>
</ul>
@endsection

@section('content')
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
                <div>
                    <img src="" alt="No picture here">
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
@if (session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <button type="close"></button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="my-2 container">
    <form method="POST" action="{{asset('home/'.$user->id.'/edited')}}">
        @method('PATCH')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
        <button type="submit" class="col btn btn-primary">Xác nhận</button>
    </form>
    <form method="GET" action="{{asset('home/')}}">
        <button type="submit" class=" col my-2 btn btn-secondary">Hủy bỏ</button>
    </form>
</div>
@endsection
