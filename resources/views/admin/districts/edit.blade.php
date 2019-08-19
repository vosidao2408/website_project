@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-block">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-10 col-12">
            <h1>Districts</h1>
            <div class="row">
                <div class="col-md-4">
                    <form action="{{route('district.update', $district->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{$district->name}}">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
