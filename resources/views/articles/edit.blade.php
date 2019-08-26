@extends('layouts.app')

@section('title','Chỉnh sửa tin')

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
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
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
    <form method="POST" action="{{asset('home/posts/'.$post->slug)}}" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <label for="">Tiêu đề</label>
                <input class="form-control" type="text" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group col-md-8">
                <label for="">Số điện thoại</label>
                <input class="form-control" type="text" name="contact" value="{{$post->contact}}">
            </div>
            <div class="form-group col-md-4">
                <label for="">Giá</label>
                <input class="form-control" type="text" name="price" value="{{$post->price}}">
            </div>
            <div class="form-group col-md-8">
                <label for="">Địa chỉ</label>
                <input class="form-control" type="text" name="address" value="{{$post->address}}">
            </div>
            <div class=" form-group col-md-4">
                <label for="">Quận</label>
                <select class="form-control js-example-basic-single" name="district">
                    <option value="{{$post->district->id}}" @if ($post->district->id == $post->district_id)
                        selected
                        @endif
                        >{{$post->district->name}}</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="">Ảnh</label>
                <input type="file" name="images[]" class="form-control" multiple required>
                <div class="border border-dark rounded p-1 mt-1">
                    @foreach ($srcs as $src)
                    <img class="img-thumbnail" src="{{asset('images/posts/'.$src)}}" alt="" width="120" height="120">
                    @endforeach
                </div>
            </div>
            <div class="form-group col-12">
                <label for="">Nội dung</label>
                <textarea class="form-control" rows="5" name="content">{{$post->content}}</textarea>
            </div>
        </div>
        <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
    </form>
    <form class="my-2" method="GET" action="{{asset('home/posts/'.$post->slug)}}">
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
