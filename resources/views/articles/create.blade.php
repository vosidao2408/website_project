@extends('layouts.app')

@section('title','Create post')

@section('css')
<link rel="stylesheet" href="{{asset('css/select2.css')}}">
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
<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="informationLabel" aria-hidden="true">
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
    <form method="POST" action="{{asset('home/posts/')}}">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <label for="">Tiêu đề</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group col-md-8">
                <label for="">Số điện thoại</label>
                <input class="form-control" type="text" name="contact">
            </div>
            <div class="form-group col-md-4">
                <label for="">Giá</label>
                <input class="form-control" type="text" name="price">
            </div>
            <div class="form-group col-md-8">
                <label for="">Đia chỉ</label>
                <input class="form-control" type="text" name="address">
            </div>
            <div class="form-group col-md-4">
                <label for="">Quận</label>
                <select class="form-control js-example-basic-single" name="district">
                    @foreach($districts as $district)
                    <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <body>
            <textarea name="content" id="editor">Nhập bài viết ở đây...</textarea>
        </body>
        <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
    </form>
    <form class="my-2" method="GET" action="{{asset('home/posts/')}}">
        <button class="col btn btn-sm btn-primary">Hủy bỏ</button>
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

</script>
@endpush
