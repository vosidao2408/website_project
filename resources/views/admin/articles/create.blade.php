@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header d-flex justify-content-between align-items-center">
        <h1>Add New Article</h1>
    </section>
    <br>
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-8 align-self-center">
            <form action="{{route('article.store')}}" method="post">
                @method('post')
                @csrf
                <div class="form-group">
                    <label for="title" class="font-weight-bold">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                {{-- <div class="form-group">
                    <label for="categories" class="font-weight-bold">Category</label>
                    <select class="form-control select2-multi" id="categories" name="categories[]" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="address" class="font-weight-bold">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content" class="font-weight-bold">Content</label>
                    <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-sm btn-success text-uppercase">save</button>
           </form>
      </div>
    </div>
  </section>
</div>
@endsection
