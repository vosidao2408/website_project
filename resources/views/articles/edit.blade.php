@extends('layouts.app')

@section('title','Edit post')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}" data-toggle="modal" data-target="#information">Thông tin cá nhân</a>
<a class="dropdown-item" href="{{asset('home/user/editpass')}}">Đổi mật khẩu</a>
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
</script>
@endpush