@extends('admin.layout.admin')
@section('title', 'Payment Methods List')
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Payment Methods</li>
                        </ol>
                        <h1>Payment Methods</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ">
                            <a href="{{ url('paymentMethod/create') }}" class="btn btn-primary">New Payment Method</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                            <th>Account Type</th>
                                            <th>Bank Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($paymentMethods as $paymentMethod)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/img/' . $paymentMethod->image) }}"
                                                        width="100px" height="100px">
                                                </td>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $paymentMethod->acc_name }}</td>
                                                <td> {{ $paymentMethod->acc_number }} </td>
                                                <td> {{ $paymentMethod->acc_type }}</td>
                                                <td> {{ $paymentMethod->bank_name }}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{ url('paymentMethod/' . $paymentMethod->id . '/edit') }}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{ url('paymentMethod/' . $paymentMethod->id) }}"
                                                        id="delete-form{{ $paymentMethod->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($paymentMethod->payments->isEmpty())
                                                            <button type="button"
                                                                onclick="confirmDelete({{ $paymentMethod->id }})"
                                                                class="btn btn-danger px-2">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        @endif

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>
@endsection
