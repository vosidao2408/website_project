@extends('layouts.app')

@section('title','Show')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <h2>{{$article->title}} <span class="badge
        @if ($article->status == " Còn Trống") badge-primary @else badge-warning @endif">{{$article->status}}</span></h2>
    <div class="d-flex">
        <p><b>{{$article->address}},</b></p>
        <p class="ml-1 mr-auto"><b>{{$article->district->name}}</b></p>
        <p><b>{{$article->contact}}</b></p>
    </div>
    {!!$article->content!!}
    <div id="carouselExampleControls" class="carousel slide
    " data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($srcs as $src)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{$src}}" class="d-block w-100" alt="...">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection