@extends('layouts.app')

@section('title','Chỉnh sửa tin')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
<style>
        .col-1.d-none {
            display: none!important;
        }
    </style>
@endsection



@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('content')
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
<div class="container">
    <form method="POST" action="{{asset('home/posts/'.$post->slug)}}">
        @method('PUT')
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <label for="">Tiêu đề</label>
                <input class="form-control" type="text" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group col-12">
                <label for="">Số điện thoại</label>
                <input class="form-control" type="text" name="contact" value="{{$post->contact}}">
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
        </div>

        <body>
            <textarea name="content" id="editor">{{$post->content}}</textarea>
        </body>
        <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
    </form>
    <form class="my-2" method="GET" action="{{asset('home/posts/'.$post->slug)}}">
        <button class="col btn btn-sm btn-primary">Huy bỏ</button>
    </form>
</div>
@endsection

@push('javascript')
<script>
    CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: "{{asset('/ckfinder/ckfinder.html')}}",
        filebrowserUploadUrl: "{{asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}"
    });
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
    $('.alert.alert-danger').show(2).delay(5000).hide("slow");
</script>
@endpush
