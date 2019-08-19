@extends('layouts.app')

@section('title','Thay đổi mật khẩu')

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
<div class="my-2 container">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
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
        <div id="messagePassword"></div>
        <button id="submit" type="submit" class="col btn btn-primary">Xác nhận</button>
    </form>
    <form method="GET" action="{{asset('home/')}}">
        <button type="submit" class=" col my-2 btn btn-secondary">Hủy bỏ</button>
    </form>
</div>
@endsection

@push('javascript')
<script>
    $(document).ready(function() {
        $('#password').keyup(function(){
            var pw = $('#password').val();
            var len = pw.length;
            if (len < 6){
                $('#messagePassword').html('* Mật khẩu nên có ít nhất 6 ký tự');
                $('#messagePassword').css('color','red');
                return false;
            } else {
                $('#messagePassword').html('');
                return true;
            }
        })
        $('#confirmPassword').keyup(function(){
            var pw = $('#password').val();
            var cfpw = $('#confirmPassword').val();
            if (cfpw!==pw){
                $('#messagePassword').html('* Mật khẩu xác nhận không khớp');
                $('#messagePassword').css('color','red');
                return false;
            } else {
                $('#messagePassword').html('');
                return true;
            }
        });
        $('.alert.alert-danger').show(2).delay(5000).hide("slow");
    });
</script>
@endpush