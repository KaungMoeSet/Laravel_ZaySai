@extends('admin.layout.admin')
@section('title', 'Edit Sub-Category')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-8">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">
                                Edit Sub-Category
                            </li>
                        </ol>
                        <h1 class="content-title">
                            Edit Sub-Category
                        </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('subCategory.update', $subCategory->id) }}"
                    enctype="multipart/form-data" class="">
                    @csrf
                    @method('PUT')
                    <!-- SELECT2 EXAMPLE -->
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Basic Information</h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="category_name" class="form-control"
                                                    value="{{ $subCategory['name'] }}">
                                                <span class="help-inline">
                                                    @error('category_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Parent Category</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="my-select">My Select</label>
                                                <select id="my-select" name="insert_option" class="form-control">
                                                    <option value="">None</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category['id'] }}"
                                                            {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="help-inline">
                                                    @error('insert_option')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>


                        <div class="col-12 container ">
                            <div class="row justify-content-end">
                                <a href="{{ url('subCategory') }}" class="btn btn-secondary col-1 mx-2">Cancel</a>

                                <input type="submit" value="Update" class="btn btn-warning col-1 mx-2">
                            </div>
                        </div>

                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
