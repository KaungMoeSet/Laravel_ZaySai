@extends('admin.layout.admin')
@section('title', 'Add New Payment')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('paymentMethod') }}">Payments</a></li>
                            <li class="breadcrumb-item active">New Payment</li>
                        </ol>
                        <h1 class="content-title">New Payment</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('paymentMethod.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <label>Account Name</label>
                                                <input class="form-control select2" name="acc_name"
                                                    value="{{ old('acc_name') }}">
                                                <span class="help-inline">
                                                    @error('acc_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" name="acc_no"
                                                    class="form-control select2" value="{{ old('acc_no') }}">
                                                <span class="help-inline">
                                                    @error('acc_no')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <input type="text" class="form-control select2"
                                                    name="acc_type"
                                                    value="{{ old('acc_type') }}">
                                                <span class="help-inline">
                                                    @error('acc_type')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <select id="bank_name" name="bank_name" class="form-control">
                                                    <option value="" disabled selected>Choose your Bank</option>
                                                    @for ($i = 0; $i < count($bankNames); $i++)
                                                        <option value="{{ $bankNames[$i] }}">
                                                            {{ $bankNames[$i] }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <span class="help-inline">
                                                    @error('bank_name')
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
