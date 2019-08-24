@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Users</h1>
    <div class="row">
        <div class="col-12 mb-2"><img class="img-thumbnail" src="{{asset('images/users/'.$userOther->image_path)}}"
                alt="" width="200" height="200"></div>
        <div class="col-md-4 border py-1"><b>ID :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->id}}</div>
        <div class="col-md-4 border py-1"><b>Tên :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->name}}</div>
        <div class="col-md-4 border py-1"><b>Email :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->email}}</div>
        <div class="col-md-4 border py-1"><b>Số Điện Thoại :</b></div>
        <div class="col-md-8 border py-1">@if ($userOther->phone == null)
            Chưa Cập Nhật
            @else
            {{$userOther->phone}}
            @endif</div>
        <div class="col-md-4 border py-1"><b>Mật khẩu :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->password}}</div>
        <div class="col-md-4 border py-1"><b>Số Bài Viết :</b></div>
        <div class="col-md-8 border py-1">{{count($userOther->articles)}}</div>
        <div class="col-md-4 border py-1"><b>Xác nhận Email :</b></div>
        <div class="col-md-8 border py-1">@if ($userOther->email_verified_at == null)
            <i class="fas fa-times text-danger"></i>
            @else
            <i class="fas fa-check text-primary"></i>
            @endif</div>
        <div class="col-md-4 border py-1"><b>Ngày Tạo :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->created_at}}</div>
        <div class="col-md-4 border py-1"><b>Ngày Cập Nhật :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->updated_at}}</div>
        <div class="col-md-4 border py-1"><b>Ngày Cập Nhật :</b></div>
        <div class="col-md-8 border py-1">{{$userOther->updated_at}}</div>
    </div>
    <hr>
    <h3>Bài Viết</h3>
    <div class="row">
        @foreach ($userOther->articles as $post)
        <a class="col-md-4 mb-1" href="{{asset('admin/article/'.$post->slug)}}">
            <div class="box-sizing admin-box border border-secondary rounded">
                <div class="card-body">{{$post->title}}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
