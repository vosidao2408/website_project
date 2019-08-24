@extends('layouts.app')

@section('title','Upload Avatar')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<style>
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
    <div class="card m-2">
        <div class="card-header text-center pb-0"><h3>UPLOAD AVATAR</h3></div>
        <div class="card-body">
            <img class="img-thumbnail d-block mr-auto ml-auto mb-2" src="{{asset('images/users/'.$user->image_path)}}" alt=""
                width="250" height="270">
            <form id="form-upload" method="POST" action="{{asset('home/avatar')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ảnh Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" name="avatar" class="form-control" required>
                    </div>
                </div>
            </form>
            <button id="submit-upload" type="submit" class="col btn btn-primary">Xác nhận</button>
            <form method="GET" action="{{asset('home/')}}">
                <button type="submit" class=" col my-2 btn btn-secondary">Hoàn tất</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<script>
    $('#submit-upload').click(function (e) {
        $('form#form-upload').submit();
        return false;
    });
        $('.alert.alert-danger').show(2).delay(5000).hide("slow");
</script>
@endpush
