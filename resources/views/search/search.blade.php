@extends('layouts.app')

@section('title','Tìm kiếm')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@endsection

@section('button-navbar')
<li class="nav-item active"><a class="nav-link" href="{{asset('index')}}">Trang Chủ</a></li>
<li class="nav-item"><a class="nav-link" href="{{asset('home')}}">Trang Cá Nhân</a></li>
@endsection

@section('search')
<div class="navbar navbar-expand navbar-light pt-0" style="background-color: #e3f2fd;">
    <div class="container">
        <form class="comeback-search col" action="{{asset('index')}}" method="get">
            <div class="input-group">
                <input id="comeback-search" type="search" name="search" class="form-control"
                    placeholder="Input Address Or District To Search" />
            </div>
        </form>
    </div>
</div>

@endsection

@section('content')
<div class="col-md-10">
    <div class="row">
        @foreach($articles as $row)
        <div class="col-12">
            <a href="{{asset('index/'.$row->slug)}}" style="text-decoration: none">
                <div class="box-sizing border border-secondary rounded my-1" style="background:#F0FFFF;">
                    <div class="m-2 d-flex">
                        <img src="{{url('images/'.$row->user->image_path)}}" class="rounded-circle bg-primary"
                            style="width:30px;height:30px ">
                        <span class="mx-2 mt-1 text-capitalize text-primary">
                            <strong>{{$row->user->name}}</strong>
                        </span>
                    </div>
                    <div class="ml-4 text-dark overflow-hidden">{!!$row->content!!}</div>
                    <p class="ml-4 text-primary">
                        <small>Address: {{$row->address}}</small>
                    </p>
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
    <div class="d-flex justify-content-center align-items-center">{!! $articles->links() !!}</div>

</div>
@endsection

@push('javascript')
<script>
    $('#modalWarning').modal('show')

    $('#comeback-search').click(function (e) {
        $('form.comeback-search').submit();
        return false;
    });
</script>
@endpush
