@extends('layouts.admin')

@section('title','Dashboard người dùng')

@section('content')
<div class="container-fluid">
    <h1>Users</h1>
    <div class="d-flex justify-content-between mb-1">
        <h4>Số lượng hiện có : <span>{{$users->total()}}</span></h4>
        <form action="{{asset('admin/user/delete')}}" method="post">
            @csrf
            @method('Delete')
            <button class="btn btn-success">Xóa User Chưa Verify</button>
        </form>
    </div>  
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Verify</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="text-center">
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->email_verified_at == null)
                            <i class="fas fa-times text-danger"></i>
                            @else
                            <i class="fas fa-check text-primary"></i>
                            @endif
                        </td>
                        <td class="d-flex justify-content-around align-items-center">
                            <form action="{{route('user.show', $user->id)}}" method="get">
                                <button type="submit" class="btn btn-sm btn-primary">Show</button>
                            </form>
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
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
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
