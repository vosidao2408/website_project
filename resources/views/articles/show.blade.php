@extends('layouts.app')

@section('title','Show post')

@section('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}" data-toggle="modal" data-target="#information">Information</a>
<a class="dropdown-item" href="{{asset('home/user/editpass')}}">Change Password</a>
@endsection

@section('content')
<div class="modal fade" id="information" tabindex="-1" role="dialog" aria-labelledby="informationLabel"
    aria-hidden="true">
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
    <h2>{{$post->title}} <span class="badge
        @if ($post->status == " Còn Trống") badge-primary @else badge-warning @endif">{{$post->status}}</span></h2>
    <div class="d-flex">
        <p>{{$post->address}}</p>
        <p class="ml-1 mr-auto">{{$post->districts->name}}</p>
        <p>{{$post->contact}}</p>
    </div>
    {!!$post->content!!}
    <div class="d-flex mt-3">
        <form class="mr-1" method="GET" action="{{asset('home/posts/'.$post->slug.'/edit')}}">
            <button type="submit" class="btn btn-warning">Edit post</button>
        </form>
        <form class="mr-1" method="GET" action="{{asset('home/posts/')}}">
            <button type="submit" class="btn btn-primary">Come back</button>
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePost">
            Delete Post
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePostLabel">Xác nhận xóa!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Bạn thực sự muốn <b>xóa</b> tin này??</p>
                    </div>
                    <div class="modal-footer justify-content-around">
                        <form method="POST" action="{{asset('home/posts/'.$post->slug)}}">
                          @method('DELETE')
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger">Delete Now</button>
                          </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Just  Mistake</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <form class="mr-1" method="POST" action="{{asset('home/posts/'.$post->slug)}}">
        @method('DELETE')
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger">Delete post</button>
        </form> --}}
    </div>
</div>
@endsection

@push('javascript')

@endpush
