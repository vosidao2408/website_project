@extends('layouts.app')

@section('title','Search')

@section('css')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
@endsection

@section('search')
<form class="comeback-search col" action="{{asset('index/')}}" method="get">
    <div class="input-group">
        <input id="comeback-search" type="search" name="search" class="form-control"
            placeholder="Input Address Or District To Search" />
    </div>
</form>
@endsection

@section('content')
<div class="container">
    <div class="d-flex">
        <div class="col-2">{{-- quang cao --}}</div>
        <div class="col-8">
            <div class="row">
                @foreach($articles as $row)
                <div class="px-5 col-12">
                    <div class=" box-sizing border my-1 bg-light">
                        <a 
                        @auth
                        href="{{asset('/home/index/'.$row->slug)}}"
                        @endauth
                        href="{{asset('index/'.$row->slug)}}" style="text-decoration: none">
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
                            <h4 class="modal-title text-secondary">Không tìm thấy dữ liệu.</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p class="text-secondary">Dữ liệu hiện không tìm được. Hãy nhập vào địa chỉ khác.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-2">{{-- quang cao --}}</div>
    </div>
    <div class="d-flex justify-content-center align-items-center">{!! $articles->links() !!}</div>
</div>
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
