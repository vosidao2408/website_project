@extends('layouts.admin')

@section('css')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center">
            <form method="POST" action="{{route('article.update', $article->slug)}}">
                @method('put')
                @csrf
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="">Tiêu đề</label>
                        <input class="form-control" type="text" name="title" value="{{$article->title}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Trạng thái</label>
                        <select class="form-control js-example-basic-single" name="district">
                            <option value="Còn Trống">Còn Trống</option>
                            <option value="Đã Thuê">Đã Thuê</option>  
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Số điện thoại</label>
                        <input class="form-control" type="text" name="contact" value="{{$article->contact}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Giá</label>
                        <input class="form-control" type="text" name="price" value="{{$article->price}}">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Đia chỉ</label>
                        <input class="form-control" type="text" name="address" value="{{$article->address}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Quận</label>
                        <select class="form-control js-example-basic-single" name="district">
                            @foreach($districts as $district)
                            <option value="{{$district->id}}"
                                {{$article->district_id == $article->district->id ? 'selected' : ''}}>
                                {{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <body>
                    <textarea name="content" id="editor">{{$article->content}}</textarea>
                </body>
                <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
            </form>
            <form class="my-2" method="GET" action="{{route('article.index')}}">
                <button class="col btn btn-sm btn-primary">Hủy bỏ</button>
            </form>
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
    $('.js-example-basic-single').select2();

</script>
@endpush
