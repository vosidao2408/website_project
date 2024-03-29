@extends('layouts.app')

@section('title','Tìm kiếm')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@endsection

@section('button-navbar')
<li class="nav-item text-navbar active"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item text-navbar"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('search')
<div class="search-bar">
    <div class="container">
        <form class="search col py-0" action="{{route('search')}}" method="get">
            <div class="input-group py-0">
                <input id="search" type="search" name="search" class="search"
                    placeholder="Input Address Or District To Search" />
            </div>
        </form>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($articles as $row)
        <div class="col-12">
            <a class="parent-box" href="{{asset('index/'.$row->slug)}}" style="text-decoration: none">
                <div class="d-flex box-sizing index-box border-post my-1" style="background:#F0FFFF;">
                    <div class="content-group">
                        <div class="m-2 d-flex">
                            <img src="{{url('images/users/'.$row->user->image_path)}}" class="rounded-circle bg-primary"
                                style="width:30px;height:30px ">
                            <span class="mx-2 mt-1 text-capitalize text-primary">
                                <strong>{{$row->user->name}}</strong>
                            </span>
                        </div>
                        <div class="ml-4 text-dark text-content content-post index-search">{{$row->content}}</div>
                        <p class="ml-4 text-primary text-info-small">
                            <small>Address: {{$row->address}}</small>
                        </p>
                    </div>
                    <div class="arrow-show"><div class="arrow-inside"></div></div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @if (session('status'))
    <div class="modal fade" id="modalWarning">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Không tìm thấy dữ liệu.</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text-primary">Dữ liệu hiện không tìm được. Hãy nhập vào địa chỉ khác.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="d-flex justify-content-center align-items-center mt-1">{!! $articles->links() !!}</div>
</div>

@endsection

@push('javascript')
<script>
    $('#modalWarning').modal('show')
    $('#search').keypress(function (e) {
        if (e.which == 13) {
            $('form.search').submit();
            return false;
        }
    });

</script>

@endpush
