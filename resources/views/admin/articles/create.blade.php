@extends('layouts.admin')

@section('title','Dashboard bài viết')

@section('css')
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 align-self-center">
            <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
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
                        <label for="">Địa chỉ</label>
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
                    <div class="form-group col-12">
                        <label for="">Ảnh</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Nội dung</label>
                        <textarea class="form-control" rows="5" name="content"></textarea>
                    </div>                    
                </div>
                <button type="submit" class="col mt-2 btn btn-sm btn-success">Xác nhận</button>
            </form>
            <form class="my-2" method="GET" action="{{route('article.index')}}">
                <button class="col btn btn-sm btn-primary">Hủy bỏ</button>
            </form>
        </div>
    </div>

</div>
@endsection

@push('javascript')
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
    $('.js-example-basic-single').select2();

</script>
@endpush
