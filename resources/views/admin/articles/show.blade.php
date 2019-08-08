@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-block">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-10 col-12">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$article->title}}</h2>
                    @if ($article->created_at != null)
                        <p class="text-muted">Created_at: {{$article->created_at}}</p>
                    @endif
                    <hr>
                    <h6>Address: </h6><p class="font-italic font-weight-bold">{{$article->address}}</p>
                    <h6>District: </h6><p class="font-italic font-weight-bold">{{$article->district->name}}</p>
                    <h6>Contact: </h6><p class="font-italic font-weight-bold">{{$article->contact}}</p>
                    <h6>Price: </h6><p class="font-italic font-weight-bold">{{$article->price}}</p>
                    <hr>
                    {!!$article->content!!}
                    <p>{{$article->image_path}}</p>
                    <hr>
                    <p class="text-muted font-italic">Posted by: {{$article->user->name}}</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="form-row">
                        <form action="" method="get">
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
    </div>
</div>
@endsection
