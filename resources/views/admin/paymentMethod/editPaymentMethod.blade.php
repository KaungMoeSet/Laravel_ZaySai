@extends('admin.layout.admin')
@section('title', 'Update Payment')
@section('content')
    <section class="content-container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('paymentMethod') }}">Payments</a></li>
                            <li class="breadcrumb-item active">Update Payment</li>
                        </ol>
                        <h1 class="content-title">Update Payment</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form method="POST" action="{{ route('paymentMethod.update', $paymentMethod->id) }}"
                    enctype="multipart/form-data">
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
                                                <label>Account Name</label>
                                                <input class="form-control select2" name="acc_name"
                                                    value="{{ $paymentMethod->acc_name }}">
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
                                                <input type="text" name="acc_no" class="form-control select2"
                                                    value="{{ $paymentMethod->acc_number }}">
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
                                                <input type="text" class="form-control select2" name="acc_type"
                                                    value="{{ $paymentMethod->acc_type }}">
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
                                                    <option value="" disabled>Choose your Bank</option>
                                                    @for ($i = 0; $i < count($payNames); $i++)
                                                        <option value="{{ $payNames[$i] }}"
                                                            {{ $payNames[$i] == $paymentMethod->bank_name ? 'selected' : '' }}>
                                                            {{ $payNames[$i] }}
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

                                <input type="submit" value="Update" class="btn btn-warning col-2 mx-2">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
        </section>
    </section>
@endsection
