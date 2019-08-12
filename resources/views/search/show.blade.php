@extends('layouts.app')

@section('title','Show')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@endsection

@section('content')
    {{$article->title}}
    {!!$article->content!!}
    {{$article->image_path}}
@endsection