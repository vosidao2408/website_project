@extends('layouts.app')

@section('css')
<link href="{{asset('css/bootstrap4-toggle.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap4-toggle.js')}}"></script>
@endsection

@section('nav-button')
<a href="{{asset('/home/posts/create')}}">Create Post</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="mt-1 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="mr-auto card-title">{{$post->title}}</h5>
                        <input id="{{$post->slug}}" id="status" class="pb-1" type="checkbox" name="status" checked
                        @if ($post->status == "Còn Trống")
                        checked
                        @endif
                        data-toggle="toggle" data-size="sm" data-on="Còn Trống" data-off="Cho Thuê" data-onstyle="primary" data-offstyle="warning">
                    </div>
                    <div class="d-flex">
                        <p>{{$post->address}}</p>
                        @foreach ($post->districts() as $district)
                        <P class="mt-auto">{{$district->name}}</P>
                        @endforeach
                        <p>{{$post->contact}}</p>
                    </div>
                    <p class="overflow">{!!$post->content!!}</p>
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

@push('javascript')
{{-- <script>
$(document).ready(function(){
    $("#status").click(function(){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var url = "{{asset('home/post/')}}";
        var slug = $(this).attr("id");
        if (checked == true ){
            var status = "Cho Thuê";}
        else {
            var status = "Còn Trống";
        }
        $.ajax({
            type: "POST",
            url: url,
            data: {slug: slug, status: status},
            cache: false,
            success: function(data){
                alert(data.success);
            }
        });
        return false;
    });
});
</script> --}}
<script>
$(document).ready(function(){
    $.ajax{
        url: "{{route('status')}}"
        method:'POST',
        data: 
    }
    $(document).click('#status',function(){
        
    })
})
</script>
@endpush