@extends('layouts.app')

@section('title','Show post')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('content')
<div class="container">   
    <h2>{{$post->title}} <span class="badge
        @if ($post->status == "Còn Trống")
        badge-primary
        @else
        badge-warning
        @endif">{{$post->status}}</span></h2>
    <div class="d-flex">
        <p>{{$post->address}}</p>
        <p class="ml-1 mr-auto">{{$district->name}}</p>
        <p>{{$post->contact}}</p>
    </div>
    {!!$post->content!!}
    <div class="d-flex mt-3">
        <form class="mr-1" method="GET" action="{{asset('home/posts/'.$post->slug.'/edit')}}">
            <button type="submit" class="btn btn-warning">Edit post</button>
        </form>
        <form class="mr-1" method="GET" action="{{asset('home/posts/')}}">
            <button type="submit" class="btn btn-primary">Come back</button>
        </form>
        <form class="mr-1" method="POST" action="{{asset('home/posts/'.$post->slug)}}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger">Delete post</button>
        </form>
    </div>
</div>
@endsection

@push('javascript')

@endpush
