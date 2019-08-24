@extends('layouts.app')

@section('title','Xem bài viết')

@section('css')

@endsection

@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h3 id="status-post" >Bạn hiện có : <span>{{$posts->total()}}</span> bài viết</h3>
        <form action="{{asset('home/posts/create')}}" method="get">
            <button class="btn btn-outline-success" type="submit">Tạo bài viết</button>
        </form>
    </div>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-12 @if ($post->status == "Đã Thuê") opacity @endif">
            <div class="box-sizing border border-secondary rounded my-1" style="background:#F0FFFF;">
                <div class="m-2 ml-4">
                    <p class="badge badge-pill badge-secondary mb-0">{{$post->district->name}}</p>
                    <div class="d-flex">
                    <h4 class="mr-auto text-title"><strong>{{$post->title}}</strong></h4>
                    <form method="POST" action="{{asset('home/posts/'.$post->slug.'/status')}}">
                        @method('PUT')
                        {{ csrf_field() }}
                        @if ($post->status == "Còn Trống")
                        <input class="d-none" type="text" name="status" value="Đã Thuê">
                        <button type="submit" class="btn btn-sm btn-primary">Còn Trống</button>
                        @else
                        <input class="d-none" type="text" name="status" value="Còn Trống">
                        <button type="submit" class="btn btn-sm btn-warning">Đã Thuê</button>
                        @endif
                        </button>
                    </form>
                </div>
                <div class="text-dark text-content overflow-hidden">{!!$post->content!!}</div>
                <p class="d-block text-primary">
                    <small>Address: {{$post->address}}</small>
                </p>
                <form class="d-block" method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                    <button type="submit" class="btn btn-sm btn-success">Xem thêm</button>
                </form></div>
            </div>
            
        </div>
@endforeach
</div>
</div>
@endsection
