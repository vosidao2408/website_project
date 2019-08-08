@extends('layouts.app')

@section('css')
<link href="{{asset('css/bootstrap4-toggle.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap4-toggle.js')}}"></script>
<style>
    .opacity {
        opacity: 0.5;
    }
    .font-fira {
      font-family: 'Fira Sans Condensed', sans-serif;
    }
</style>
@endsection

@section('nav-button')
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}" data-toggle="modal" data-target="#information">Thông tin cá
    nhân</a>
<a class="dropdown-item" href="{{asset('home/user/editpass')}}">Đổi mật khẩu</a>
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
        <div class="mt-1 col-12">
            <div class="card">
                <div class="card-body
                @if ($post->status == " Đã Thuê") opacity @endif ">
                    <div class=" d-flex">
                    <h4 class="mr-auto card-title"><strong>{{$post->title}}</strong></h4>
                    <form method="POST" action="{{asset('home/posts/'.$post->slug.'/status')}}">
                        @method('PUT')
                        {{ csrf_field() }}
                        @if ($post->status == "Còn Trống")
                        <input class="d-none" type="text" name="status" value="Đã Thuê">
                        <button type="submit" class="btn btn-sm btn-primary btn-opacity">Còn Trống</button>
                        @else
                        <input class="d-none" type="text" name="status" value="Còn Trống">
                        <button type="submit" class="btn btn-sm btn-warning btn-opacity">Đã Thuê</button>
                        @endif
                        </button>
                    </form>
                </div>
                <div class="d-flex">
                    <p class="mr-auto"><b>{{$post->address}}, <span class="badge badge-pill badge-secondary">{{$post->district->name}}</span></b></p>                    
                    <p><b>Số điện thoại: {{$post->contact}}</b></p>
                </div>
                <p>{!!$post->content!!}</p>
                <form method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                    <button type="submit" class="btn btn-sm btn-success">Xem thêm</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
