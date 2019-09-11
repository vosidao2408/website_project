@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Articles</h1>
    <div class="d-flex justify-content-between">
        <h4>Số lượng hiện có : <span>{{$articles->total()}}</span></h4>
        <form action="{{route('article.create')}}" method="get">
            <button type="submit" class="btn btn-sm btn-info">Tạo Bài Viết</button>
        </form>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Tiêu Đề</th>
                        <th>Địa Chỉ</th>
                        <th>Liên Lạc</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr class="text-center">
                        <th>{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->address}}, {{$article->district->name}}</td>
                        <td>{{$article->contact}}</td>
                        <td>{{$article->status}}</td>
                        <td class="d-flex justify-content-around align-items-center">
                            <form action="{{route('article.show', $article->slug)}}" method="get">
                                <button type="submit" class="btn btn-sm btn-primary">Xem</button>
                            </form>
                            <form action="{{route('article.edit', $article->slug)}}" method="get">
                                <button type="submit" class="btn btn-sm btn-warning">Sửa Bài</button>
                            </form>
                            <form action="{{route('article.destroy', $article->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
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
</div>
@endsection
