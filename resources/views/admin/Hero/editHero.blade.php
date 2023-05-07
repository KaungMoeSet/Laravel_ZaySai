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
                            <li class="breadcrumb-item active">Update Hero</li>
                        </ol>
                        <h1 class="content-title">Update Hero</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('heroCarousel.update' , $hero->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                    value="{{ $hero->title }}">
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
                                                    value="{{ $hero->description }}">
                                                <span class="help-inline">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Hero Carousel Image</label>
                                                <div>
                                                    <img src="{{ asset('storage/img/' . $hero->image) }}" height="100"
                                                        width="100">
                                                    <input type="file" name="image"
                                                        value="{{ old('image') ?? $hero->image }}">
                                                    @error('bank_name')
                                                        <span class="help-inline">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
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
                                <a href="{{ url('heroCarousel') }}" class="btn btn-secondary col-2 mx-2 px-2">Cancel</a>

                                <input type="submit" onclick="saveSuccess()" value="Update"
                                    class="btn btn-warning col-2 mx-2">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
