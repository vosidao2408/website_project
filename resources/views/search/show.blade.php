@extends('layouts.app')

@section('title','Xem bài viết')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('button-navbar')
<li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item text-navbar"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="container">
    <div class="border-post p-2 mt-2">
        <div class="m-2 d-flex">
            <img src="{{url('images/users/'.$post->user->image_path)}}" class="rounded-circle bg-primary"
                style="width:30px;height:30px ">
            <span class="mx-2 mt-1 text-capitalize text-primary">
                <strong>{{$post->user->name}}</strong>
            </span>
            <a class="btn btn-primary btn-sm ml-auto" href="{{asset('index')}}">Trở Lại</a>
        </div>
        <h2 class="text-title">{{$post->title}}</h2>
        <div class="row">
            <div class="col-12 col-md-8">
                <p><b>Địa chỉ : {{$post->address}}, {{$post->district->name}}</b></p>
            </div>
            <div class="col-12 col-md-4">
                <p><b>Liên hệ : {{$post->contact}}</b></p>
            </div>
        </div>
        <p><b>Giá thuê :
                @if ($post->price !== "Thỏa Thuận")
                {{number_format($post->price,0,',','.')}} <span class="text-muted">đ</span>
                @else
                {{$post->price}}
                @endif
            </b></p>
        <div><b>Nội dung :</b></div>
        <div class="text-content">{!!$post->content!!}</div>
        <div><b>Hình ảnh cụ thể :</b></div>
        {{-- carousel --}}
        <div id="carouselExampleControls" class="carousel slide
    " data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($srcs as $src)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="carousel-images" style="background-image: url('{{asset('images/posts/'.$src)}}')"></div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection

@push('javascript')
@endpush
