@extends('layouts.app')

@section('title','Edit post')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/select2.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{asset('home/posts/'.$post->slug)}}">
        @method('PUT')
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-12">
                <label for="">Title</label>
                <input class="form-control" type="text" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group col-12">
                <label for="">Contact</label>
                <input class="form-control" type="text" name="contact" value="{{$post->contact}}">
            </div>
            <div class="form-group col-md-8">
                <label for="">Address</label>
                <input class="form-control" type="text" name="address" value="{{$post->address}}">
                </div>
                <div class=" form-group col-md-4">
                <label for="">District</label>
                <select class="form-control js-example-basic-single" name="district">
                    @foreach($districts as $district)
                    <option value="{{$district->id}}" @if ($district->id == $post->id_district)
                        selected
                        @endif
                        >{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <body>
            <textarea name="content" id="editor">{{$post->content}}</textarea>
        </body>
        <button type="submit" class="col mt-2 btn btn-sm btn-success">Submit</button>
    </form>
    <form class="my-2" method="GET" action="{{asset('home/posts/'.$post->slug)}}">
        <button class="col btn btn-sm btn-primary">Cancel</button>
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
