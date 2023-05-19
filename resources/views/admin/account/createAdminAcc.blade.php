@extends('admin.layout.admin')
@section('title', 'Add New Admin')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/show-all-admins') }}">Admin Accounts</a></li>
                            <li class="breadcrumb-item active">New Admin</li>
                        </ol>
                        <h1 class="content-title">New Admin</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('admin.store') }}">
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
                                                <label for="name">{{ __('Name') }}</label>
                                                <input id="name" type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}" required autofocus>
                                                @error('name')
                                                    <span class="help-inline">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="help-inline">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control" name="password"
                                                    required>
                                                @error('acc_type')
                                                    <span class="help-inline">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required>
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
                                <a href="{{ route('admin.show-all-admins') }}"
                                    class="btn btn-secondary col-2 mx-2 px-2">Cancel</a>

                                <button type="submit" class="btn btn-warning col-2 mx-2">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
