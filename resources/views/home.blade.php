@extends('layouts.app')

@section('css')

@endsection

@section('nav-button')
@auth
<a  href="{{asset('/home/posts')}}">Show post</a>
@endauth
@endsection

@section('button')
<a class="dropdown-item" href="{{asset('home/user/')}}" data-toggle="modal" data-target="#exampleModal">Information</a>
<a class="dropdown-item" href="{{asset('home/user/editpass')}}">Change Password</a>
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Information</h5>
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

                    <h3 class="text-center">Bạn Đã Đăng Nhập Thành Công!</h3>
                      <p class="text-center mt-3">Bây giờ bạn đã có thể <a href="{{asset('home/posts/create')}}">Tạo Mới Bài Viết</a> hoặc <a href="{{asset('home/posts')}}">Xem bài viết</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
