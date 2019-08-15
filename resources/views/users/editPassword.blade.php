@extends('layouts.app')

@section('title','Edit user')



@section('css')
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

<div class="my-2 container">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="close">x</button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form method="POST" action="{{asset('home/'.$user->id.'/pass-edited')}}">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mật khẩu cũ</label>
            <div class="col-sm-10">
                <input id="oldPassword" type="password" name="oldPassword" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mật khẩu mới</label>
            <div class="col-sm-10">
                <input id="password" type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Xác nhận</label>
            <div class="col-sm-10">
                <input id="confirmPassword" type="password" name="confirmPassword" class="form-control">
            </div>
        </div>
        <span id="message"></span>
        <button id="submit" type="submit" class="col btn btn-primary">Xác nhận</button>
    </form>
    <form method="GET" action="{{asset('home/')}}">
        <button type="submit" class=" col my-2 btn btn-secondary">Hủy bỏ</button>
    </form>
</div>
@endsection

@push('javascript')
<script>
    $('#confirm_password, #password').on("keyup",function () {
        if ($('#confirmPassword').val() == $('#password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
</script>
@endpush
