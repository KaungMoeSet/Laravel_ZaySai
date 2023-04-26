@extends('admin.layout.admin')

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
                                Edit Category
                            </li>
                        </ol>
                        <h1 class="content-title">
                            Edit Category
                        </h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data" class="">
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
                                                    value="{{ $category['name']}}" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card card-outline card-info">
                                                            <div class="card-body">
                                                                <textarea id="summernote" name="description">
                                                                    {{ $category['description'] }}
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
                                                    <select name="my-select" name="insert_option" class="form-control">
                                                        <option value="" selected disabled>This is main Category
                                                        </option>
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
                                <a href="{{ url('category')}}" class="btn btn-secondary col-1 mx-2">Cancel</a>

                                <input type="submit" value="Update" class="btn btn-warning col-1 mx-2">
                            </div>
                        </div>

                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
