@extends('layouts.app')

@section('title','Edit user')

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
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<div class="my-2 container">
    <form method="POST" action="{{asset('home/user')}}">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
            </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <button type="submit" class="col btn btn-primary">Submit</button>
    </form>
    <form method="GET" action="{{asset('home/user')}}">
        <button type="submit" class=" col my-2 btn btn-secondary">Cancel</button>
    </form>
</div>
@endsection
