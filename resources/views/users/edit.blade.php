@extends('layouts.app')

@section('title','Bổ sung thông tin')



@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<style>
    .col-2.d-none {
        display: none!important;
    }
</style>
@endsection

@section('button-navbar')
<li class="nav-item text-navbar"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
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
    <form method="POST" action="{{asset('home/'.$user->id.'/edited')}}">
        @method('PUT')
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

@push('name')
<script>
$('.alert.alert-danger').show(2).delay(5000).hide("slow");
</script>
@endpush