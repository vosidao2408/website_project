@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header d-flex justify-content-between align-items-center">
    <h1>Articles</h1>
    <form action="{{route('article.create')}}" method="get">
        <button type="submit" class="btn btn-sm btn-info">CREATE NEW ARTICLE</button>
    </form>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-bordered">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="text-center">
                        <th>{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->content}}</td>
                        <td>{{$article->status}}</td>
                        <td class="d-flex justify-content-around align-items-center">
                            <form action="{{route('article.show', $article->id)}}" method="get">
                                <button type="submit" class="btn btn-sm btn-primary">Show</button>
                            </form>
                            <form action="" method="get">
                                <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                            </form>
                            <form action="{{route('article.destroy', $article->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$articles->links()}}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
