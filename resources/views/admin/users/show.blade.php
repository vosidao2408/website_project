@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Users</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-bordered showTable">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="row-ID">#</th>
                    <th scope="col" class="row-name">Name</th>
                    <th scope="col" class="row-email">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Updated Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td id="td-pass">{{$user->password}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td class="d-flex justify-content-around align-items-center">
                            <form action="" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection
