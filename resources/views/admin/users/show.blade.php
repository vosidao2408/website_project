@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Users</h1>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <th scope="row">{{$user->id}}</th>
                <td>{{$userOther->name}}</td>
                <td>{{$userOther->email}}</td>
                <td>{{$userOther->created_at}}</td>
                <td>{{$userOther->updated_at}}</td>
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
@endsection
