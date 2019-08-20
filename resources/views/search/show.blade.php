@extends('layouts.app')

@section('title','Xem bài viết')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('button-navbar')
<li class="nav-item active"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="col-md-10">
        <div class="m-2 d-flex">
                <img src="{{url('images/'.$post->user->image_path)}}" class="rounded-circle bg-primary"
                    style="width:30px;height:30px ">
                <span class="mx-2 mt-1 text-capitalize text-primary">
                    <strong>{{$post->user->name}}</strong>
                </span>
            </div>
    <h2 class="text-title">Tiêu đề : {{$post->title}}</h2>
    <div class="d-flex">
        <p><b>Địa chỉ : {{$post->address}},</b></p>
        <p class="ml-1 mr-auto"><b>{{$post->district->name}}</b></p>
        <p><b>Liên hệ : {{$post->contact}}</b></p>
    </div>
    <div><b>Nội dung bài viết :</b></div>
    <div class="text-content">{!!$post->content!!}</div>
    <div><b>Hình ảnh cụ thể :</b></div>
    {{-- carousel --}}
    <div class="owl-carousel owl-theme">
        @foreach ($srcs as $src)
        <div class="item"><img src="{{$src}}" class="img-thumbnail" alt="..."></div>
        @endforeach
    </div>
</div>
@endsection

@push('javascript')
@endpush