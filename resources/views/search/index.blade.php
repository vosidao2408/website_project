@extends('layouts.app')

@section('title','Search')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<style>
    .thumb {
      height: 75px;
      border: 1px solid #000;
      margin: 10px 5px 0 0;
    }
  </style>
@endsection

@section('search')
<form class="search col" action="{{route('search')}}" method="get">
    <div class="input-group">
        <input id="search" type="search" name="search" class="form-control"
            placeholder="Input Address Or District To Search" />
    </div>
</form>
@endsection

@section('content')
<div class="container">
    <div class="d-flex">
        <div class="col-2 d-none d-md-block">{{-- quang cao --}}</div>
        <div class="col-md-8">
            <div class="row">
                @foreach($articles as $row)
                <div class="px-5 col-12">
                    <div class=" box-sizing border my-1 bg-light">
<<<<<<< HEAD
                    <a @auth
                    href="{{asset('/home/index/'.$row->slug)}}"
                    @endauth
                    href="{{asset('index/'.$row->slug)}}" style="text-decoration: none">
=======
                        <a href="{{asset('index/'.$row->slug)}}" style="text-decoration: none">
>>>>>>> 35e9dcbcd68a0c1faac756e9f0c788c384017dcd
                            <div class="m-2 d-flex">
                                <img src="{{$row->user->image_path}}" class="rounded-circle bg-primary"
                                    style="width:30px;height:30px ">
                                <span class="mx-2 mt-1 text-capitalize text-primary">
                                    <strong>{{$row->user->name}}</strong>
                                </span>
                            </div>
                            <div class="ml-4 text-dark overflow-hidden">{!!$row->content!!}</div>
                            <p class="ml-4 text-muted">
                                <small>Address: {{$row->address}}</small>
                            </p>
                        </a>
                    </div>
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
        </div>
        <div class="col-2 d-none d-md-block">{{-- quang cao --}}</div>
    </div>
    <div class="d-flex justify-content-center align-items-center">{!! $articles->links() !!}</div>
</div>
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

    

      

