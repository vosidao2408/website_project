@extends('layouts.app')

@section('css')

@endsection

@section('nav-button')
<a href="{{asset('/home/posts/create')}}">Create Post</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="mt-1 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}} <span class="badge
                        @if ($post->status == "Còn Trống")
                        badge-primary
                        @else
                        badge-warning
                        @endif">{{$post->status}}</span></h5>
                    <div class="d-flex">
                        <p>{{$post->address}}</p>
                        @foreach ($post->districts() as $district)
                        <P class="mt-auto">{{$district->name}}</P>
                        @endforeach
                        <p>{{$post->contact}}</p>
                    </div>
                    <p class="overflow">{!!$post->content!!}</p>
                    <form method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                        <button type="submit" class="btn btn-sm btn-success">Show more</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection