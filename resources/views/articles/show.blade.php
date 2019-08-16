@extends('layouts.app')

@section('title','Xem bài viết')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
<div class="container">
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
    <div id="carouselExampleControls" class="carousel slide
    " data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($srcs as $src)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{$src}}" class="d-block w-100" alt="...">
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
<hr>
<div class="d-flex mt-3">
    <form class="mr-1" method="GET" action="{{asset('home/posts/'.$post->slug.'/edit')}}">
        <button type="submit" class="btn btn-warning"><b>Chỉnh sửa <i class="fas fa-edit fa-lg"></i></b></button>
    </form>
    <form class="mr-1" method="GET" action="{{asset('home/posts/')}}">
        <button type="submit" class="btn btn-primary"><b>Trở lại <i class="fas fa-arrow-left fa-lg"></i></b></button>
    </form>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePost">
        <b>Xóa bài <i class="fas fa-ban fa-lg"></i></b>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePostLabel">Xác nhận xóa!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Bạn thực sự muốn <b>xóa</b> tin này??</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <form method="POST" action="{{asset('home/posts/'.$post->slug)}}">
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">Xóa ngay</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <form class="mr-1" method="POST" action="{{asset('home/posts/'.$post->slug)}}">
    @method('DELETE')
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Delete post</button>
    </form> --}}
</div>
</div>
@endsection

@push('javascript')

@endpush
