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
@auth
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
@endauth
<div class="col-md-10">
        <div class="m-2 d-flex">
                <img src="{{url('images/'.$user->image_path)}}" class="rounded-circle bg-primary"
                    style="width:30px;height:30px ">
                <span class="mx-2 mt-1 text-capitalize text-primary">
                    <strong>{{$post->user->name}}</strong>
                </span>
            </div>
    <h2>Tiêu đề : {{$post->title}}</h2>
    <div class="d-flex">
        <p><b>Địa chỉ : {{$post->address}},</b></p>
        <p class="ml-1 mr-auto"><b>{{$post->district->name}}</b></p>
        <p><b>Liên hệ : {{$post->contact}}</b></p>
    </div>
    <div><b>Nội dung bài viết :</b></div>
    {!!$post->content!!}
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