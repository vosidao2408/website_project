@extends('layouts.app')

@section('css')



@endsection

@section('button-navbar')
<li class="nav-item"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item active"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
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
<div class="col-md-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thông báo</div>

                <div class="card-body">
                    <h3 class="text-center">Bạn Đã Đăng Nhập Thành Công!</h3>
                    <p class="text-center mt-3">Bạn có thể cần làm những điều dưới đây:</p>
                    <div class="d-flex justify-content-center">
                      <form method="GET" action="{{asset('home/posts/create')}}">
                        <button class="mr-1 btn btn-primary" type="submit">Tạo Bài Viết</button>
                      </form>
                      <form method="GET" action="{{asset('home/user/edit')}}">
                        <button class="ml-1 btn btn-success" type="submit">Bổ Sung Thông Tin Cá Nhân</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
