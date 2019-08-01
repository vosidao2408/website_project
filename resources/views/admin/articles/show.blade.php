@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$article->title}}</h2>
            @if ($article->created_at != null)
                <p class="text-muted">Created_at: {{$article->created_at}}</p>
            @endif
            <hr>
            <h6 class="">Address: </h6><p class="font-italic font-weight-bold">{{$article->address}}</p>
            <h6 class="">Contact: </h6><p class="font-italic font-weight-bold">{{$article->contact}}</p>
            <hr>
            <p class="font-weight-bolder">{{$article->content}}</p>
            {{--  {!!$article->content!!}  --}}
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
  </section>
</div>
@endsection
