@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-block">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-10 col-12">
            <h1>Users</h1>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
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
    </div>
</div>
@endsection
