@extends('layouts.app')

@section('headcripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-block">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-10 col-12">
            <div class="row">
                <div class="col-12 align-self-center">
                    <form method="POST" action="{{route('article.store')}}">
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
                    <form class="my-2" method="GET" action="{{route('article.index')}}">
                        <button class="col btn btn-sm btn-primary">Hủy bỏ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('ckeditor')
    <script>
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: "{{asset('/ckfinder/ckfinder.html')}}",
            filebrowserUploadUrl: "{{asset('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}"
        });
    </script>
@endpush

@push('select2')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        $('.select2-single').select2();
    </script>
@endpush

