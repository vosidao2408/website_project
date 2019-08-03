@extends('layouts.app')

@section('nav-button')
@auth
<a  href="{{asset('/home/posts')}}">Show post</a>
@endauth
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}">Information</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
