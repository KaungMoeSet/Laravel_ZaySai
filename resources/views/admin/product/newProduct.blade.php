@extends('admin.layout.admin')
@section('title', 'Add New Product')
@section('content')
    @if (session('success_message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success_message') }}",
                showConfirmButton: false,
                timer: 3000,
                toast: true
            })
        </script>
    @endif
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('product') }}">Products</a></li>
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
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <input class="form-control select2" name="product_name"
                                                    value="{{ old('product_name') }}">
                                                <span class="help-inline">
                                                    @error('product_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
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
                                                                <textarea id="summernote" name="product_description" >
                                                                    {{ old('product_description') }}
                                                                </textarea>
                                                                <span class="help-inline">
                                                                    @error('product_description')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>

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
                                                <input type="number" name="product_buying_price"
                                                    class="form-control select2" value="{{ old('product_buying_price') }}">
                                                <span class="help-inline">
                                                    @error('product_buying_price')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="number" name="product_selling_price"
                                                    class="form-control select2" value="{{ old('product_selling_price') }}">
                                                <span class="help-inline">
                                                    @error('product_selling_price')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
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
                                                <label for="main_category">Main Category</label>
                                                <select id="main_category" name="main_category" class="form-control">
                                                    <option value="" disabled selected>Choose your category</option>
                                                    @foreach ($mainCategories as $mainCategory)
                                                        <option value="{{ $mainCategory->id }}"
                                                            {{ old('main_category') == "$mainCategory->id" ? 'selected' : '' }}>
                                                            {{ $mainCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="help-inline">
                                                    @error('main_category')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12" id="sub-category-div" style="display:none;">
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Images</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Product Image</label>
                                                <input type="file" class="form-control" name="product_images[]" value="{{ old('product_images') }}"
                                                    multiple>
                                                <span class="help-inline">
                                                    @error('product_images')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Quantity</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Product Quantity</label>
                                                <input type="number" name="product_quantity" class="form-control select2" value="{{ old('product_quantity') }}">
                                                <span class="help-inline">
                                                    @error('product_quantity')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 container">
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
    <script src="{{ asset('adminFrontEnd/js/product.js') }}"></script>
@endsection
