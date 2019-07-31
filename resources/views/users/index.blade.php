@extends('layouts.app')

@section('title','Show users')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('btn-post')
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{asset('')}}">Home</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{asset('users/')}}">User</a>
    </li>
</ul>
<form method="GET" action="{{asset('users/create')}}">
    <button type="submit" class="btn btn-sm btn-outline-light">CREATE</button>
</form>
@endsection

@section('content')
<div class="container">
    <table class="mt-2 table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <form method="GET" action="{{asset('users/'.$user->id)}}">
                            <button type="submit" class="btn btn-sm btn-primary">SHOW ONLY</button>
                        </form>
                        <form method="GET" action="{{asset('users/'.$user->id.'/edit')}}">
                            <button type="submit" class="btn btn-sm btn-warning">EDIT</button>
                        </form>
                        <form method="POST" action="{{asset('users/'.$user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class=" mt-2 d-flex justify-content-center">{{$users->links()}}</div>
@endsection
