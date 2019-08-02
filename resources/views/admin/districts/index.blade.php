@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header d-flex justify-content-between align-items-center">
    <h1>Districts</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($districts as $district)
                        <tr>
                            <td>{{$district->id}}</td>
                            <td>{{$district->name}}</td>
                            <td class="d-flex justify-content-around align-items-center">
                                <form action="{{route('district.edit', $district->id)}}" method="get">
                                    <button type="submit" class="btn btn-sm btn-warning mr-1">Edit</button>
                                </form>
                                <form action="{{route('district.destroy', $district->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <form action="{{route('district.store')}}" method="post">
                @method('post')
                @csrf
                <h2>New District</h2>
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-sm btn-primary btn-block">Create New District</button>
            </form>
        </div>
    </div>
  </section>
</div>
@endsection
