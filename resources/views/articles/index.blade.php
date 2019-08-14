@extends('layouts.app')

@section('css')
<style>
    .opacity {
        opacity: 0.8;
    }
    .box-sizing:hover {
        box-shadow: 0 0 4px 2px rgba(0,255,0,0.3);
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
<div class="container">
    <div class="d-flex justify-content-between">
        <h3 class="font-fira">Bạn hiện có : <span>{{count($posts)}}</span> bài viết</h3>
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
                    <h4 class="mr-auto card-title"><strong>{{$post->title}}</strong></h4>
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
                <div class="text-dark overflow-hidden">{!!$post->content!!}</div>
                <p class="text-primary">
                    <small>Address: {{$post->address}}</small>
                </p>
                <form method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                    <button type="submit" class="btn btn-sm btn-success">Xem thêm</button>
                </form></div>
            </div>
            
        </div>
        {{-- <div class="mt-1 col-12
        @if ($post->status == "Đã Thuê") opacity @endif">
            <div class="card">
                <div class="card-body">
                    <div class=" d-flex">
                    <h4 class="mr-auto card-title"><strong>{{$post->title}}</strong></h4>
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
    <div class="d-flex">
        <p class="mr-auto"><b>{{$post->address}}, <span
                    class="badge badge-pill badge-secondary">{{$post->district->name}}</span></b></p>
        <p><b>Số điện thoại: {{$post->contact}}</b></p>
    </div>
    <p>{!!$post->content!!}</p>
    <form method="GET" action="{{asset('home/posts/'.$post->slug)}}">
        <button type="submit" class="btn btn-sm btn-success">Xem thêm</button>
    </form>
</div>
</div>
</div> --}}
@endforeach
</div>
</div>
@endsection
