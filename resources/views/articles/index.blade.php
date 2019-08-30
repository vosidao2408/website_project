@extends('layouts.app')

@section('title','Xem bài viết')

@section('css')

@endsection

@section('button-navbar')
<li class="nav-item text-navbar"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mt-2">
        <h3 class="border-post p-1">Bạn hiện có : <span>{{count($posts)}}</span> bài viết</h3>
        <form action="{{asset('home/posts/create')}}" method="get">
            <button class="btn btn-outline-success" type="submit">Tạo bài viết</button>
        </form>
    </div>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-12 my-1 @if ($post->status == " Đã Thuê") opacity @endif">
            <div class="box-sizing border-post user-post">
                <div class="inner-user-post">
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
                    <div class="text-dark text-content content-post index-article">{!!$post->content!!}</div>
                    <p class="d-block text-primary">
                        <small>Address: {{$post->address}}</small>
                    </p>
                    <form class="d-block" method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                        <button type="submit" class="btn btn-sm btn-success btn-user-post">Xem thêm</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
