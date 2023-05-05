@extends('admin.layout.admin')
@section('title', 'Add New Hero')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('heroCarousel') }}">Hero Carousel</a></li>
                            <li class="breadcrumb-item active">New Hero</li>
                        </ol>
                        <h1 class="content-title">New Hero</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('heroCarousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- SELECT2 EXAMPLE -->
                    <div class="row ">
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
                                                <label>Title</label>
                                                <input class="form-control select2" name="title"
                                                    value="{{ old('title') }}">
                                                <span class="help-inline">
                                                    @error('title')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description" class="form-control select2"
                                                    value="{{ old('description') }}">
                                                <span class="help-inline">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>link</label>
                                                <input type="text" class="form-control select2" name="link"
                                                    value="{{ old('link') }}">
                                                <span class="help-inline">
                                                    @error('link')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Hero Carousel Image</label>
                                                <input name="photo" type="file" class="form-control-file"
                                                    value="{{ old('photo') }}">
                                                @error('bank_name')
                                                    <span class="help-inline">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>

                                <!-- /.card-body -->
                            </div>

                        </div>

                        <div class="col-md-8 col-12">
                            <div class="row justify-content-end">
                                <a href="{{ url('paymentMethod') }}" class="btn btn-secondary col-2 mx-2 px-2">Cancel</a>

                                <input type="submit" onclick="saveSuccess()" value="Save"
                                    class="btn btn-warning col-2 mx-2">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
