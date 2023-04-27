@extends('admin.layout.admin')
@section('title', 'Add New Product')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('product')}}">Products</a></li>
                            <li class="breadcrumb-item active">New Product</li>
                        </ol>
                        <h1 class="content-title">New Product</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                                <input class="form-control select2" name="product_name" value="{{ old('product_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card card-outline card-info">
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <textarea id="summernote" name="description" value="{{ old('description')}}">
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
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Pricing</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Categories</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="my-select">My Select</label>
                                                <select id="my-select" name="my_select"
                                                    class="form-control js-example-basic-multiple" multiple="multiple">
                                                    @foreach ($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Pricing</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Pricing</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="number" class="form-control select2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
