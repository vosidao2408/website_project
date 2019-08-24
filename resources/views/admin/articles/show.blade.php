@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$article->title}}</h2>
            @if ($article->created_at != null)
            <p class="text-muted">Created_at: {{$article->created_at}}</p>
            @endif
            <hr>
            <h6>Address: </h6>
            <p class="font-italic font-weight-bold">{{$article->address}}</p>
            <h6>District: </h6>
            <p class="font-italic font-weight-bold">{{$article->district->name}}</p>
            <h6>Contact: </h6>
            <p class="font-italic font-weight-bold">{{$article->contact}}</p>
            <h6>Price: </h6>
            <p class="font-italic font-weight-bold">
                @if ($article->price !== "Thỏa Thuận")
                {{number_format($article->price,0,',','.')}} <span class="text-muted">đ</span>
                @else
                {{$article->price}}
                @endif</p>
            <hr>
            {!!$article->content!!}
            @if ($article->image_path != null)
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($srcs as $key => $src)
                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="height: 400px;">
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
            @endif
            <hr>
        <p class="text-muted font-italic">Posted by: <a href="{{asset('admin/user/'.$article->user->id)}}">{{$article->user->name}}</a></p>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="form-row">
                <form action="{{route('article.edit', $article->slug)}}" method="get">
                    <button type="submit" class="btn btn-sm btn-warning ml-2">Edit</button>
                </form>
                <form action="{{route('article.destroy', $article->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger ml-2">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
