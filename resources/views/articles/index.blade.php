@extends('layouts.app')

@section('css')
<link href="{{asset('css/bootstrap4-toggle.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap4-toggle.js')}}"></script>
<style>
    .opacity {
        opacity: 0.5;
    }
    .btn-opacity {
        opacity: 1.0 !important;
    }
</style>
@endsection

@section('nav-button')
<a href="{{asset('/home/posts/create')}}">Create Post</a>
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}" data-toggle="modal" data-target="#information">Information</a>
<a class="dropdown-item" href="{{asset('home/user/editpass')}}">Change Password</a>
@endsection

@section('content')
<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="informationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="informationLabel">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex">
            <div>
                <img src="" alt="No picture here">
            </div>
            <div class="ml-2">
            <p><b>Name: </b>{{$user->name}}</p>
            <p><b>Email: </b>{{$user->email}}</p>
            <p><b>Phone Number: </b>{{$user->phone}}</p>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <form method="GET" action="{{asset('home/user/edit')}}">
            <button type="submit" class="btn btn-primary">Update Information</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="mt-1 col-12">
            <div class="card">
                <div class="card-body
                @if ($post->status == "Đã Thuê")
                opacity
                @endif
                ">
                    <div class="d-flex">
                        <h5 class="mr-auto card-title">{{$post->title}}</h5>
                        <form method="POST" action="{{asset('home/posts/'.$post->slug.'/status')}}">
                                @method('PUT')
                                {{ csrf_field() }}
                                @if ($post->status == "Còn Trống")
                                <input class="d-none" type="text" name="status" value="Đã Thuê">
                                <button type="submit" class="btn btn-sm btn-primary btn-opacity">Còn Trống</button>
                                @else
                                <input class="d-none" type="text" name="status" value="Còn Trống">
                                <button type="submit" class="btn btn-sm btn-warning btn-opacity">Đã Thuê</button>
                                @endif                                
                                </button>
                        </form>
                    </div>
                    <div class="d-flex">
                        <p class="mr-1">{{$post->address}}</p>
                        <P class="mr-auto">{{$post->districts->name}}</P>
                        <p>Số điện thoại: {{$post->contact}}</p>
                    </div>
                    <p>{!!$post->content!!}</p>
                    <form method="GET" action="{{asset('home/posts/'.$post->slug)}}">
                        <button type="submit" class="btn btn-sm btn-success">Show more</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

