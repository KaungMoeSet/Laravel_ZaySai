@extends('admin.layout.admin')
@section('title', 'Add New Category')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-8">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">
                                New Category
                            </li>
                        </ol>
                        <h1 class="content-title">
                            New Category
                        </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
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
                                                <input type="text" name="category_name" class="form-control" value="{{ old('category_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card card-outline card-info">
                                                            <div class="card-body">
                                                                <textarea id="summernote" name="description" value="{{ old('description')}}">
                                                            Write description here
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.col-->
                                                </div>
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
                                                        <option value="{{ $category['id'] }}" name="parent_category">
                                                            {{ $category['name'] }}</option>
                                                    @endforeach
                                                </select>
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
                                <a href="{{ url('admin') }}" class="btn btn-secondary col-1 mx-2">Cancel</a>

                                <input type="submit" onclick="saveSuccess()" value="Save"
                                    class="btn btn-warning col-1 mx-2">
                            </div>
                        </div>

                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
