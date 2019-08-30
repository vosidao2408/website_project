@extends('layouts.app')

@section('title','Đăng tin')

@section('css')
<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<script src="{{asset('js/select2.js')}}"></script>
<style>
    .col-1.d-none {
        display: none !important;
    }

</style>
@endsection



@section('button-navbar')
<li class="nav-item text-navbar"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')

<div class="container">
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
    <form method="POST" action="{{asset('home/posts/')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <label for="">Tiêu đề</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group col-md-8">
                <label for="">Số điện thoại</label>
                <input class="form-control" type="text" name="contact">
            </div>
            <div class="form-group col-md-4">
                <label for="">Giá</label>
                <input class="form-control" type="text" name="price">
            </div>
            <div class="form-group col-md-8">
                <label for="">Địa chỉ</label>
                <input class="form-control" type="text" name="address">
            </div>
            <div class="form-group col-md-4">
                <label for="">Quận</label>
                <select class="form-control js-example-basic-single" name="district">
                    @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12">
                <label for="">Ảnh</label>
                <input type="file" name="images[]" class="form-control" multiple required>
            </div>
            <div class="form-group col-12">
                <label for="">Nội dung</label>
                <textarea class="form-control" rows="5" name="content"></textarea>
            </div>
        </div>
        <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
    </form>
    <form class="my-2" method="GET" action="{{asset('home/posts/')}}">
        <button class="col btn btn-sm btn-primary">Hủy bỏ</button>
    </form>
</div>
@endsection

@push('javascript')
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
    $('.alert.alert-danger').show(2).delay(5000).hide("slow");
</script>
@endpush
