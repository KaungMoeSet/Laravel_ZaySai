@extends('admin.layout.admin')
@section('title', 'Admin Accounts List')
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
                            <li class="breadcrumb-item active">Admin Accounts</li>
                        </ol>
                        <h1>Admin Accounts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ">
                            <a href="{{ route('admin.create') }}" class="btn btn-primary">New Admin</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td> {{ $admin->email }} </td>
                                                <td class="d-flex justify-content-end ">

                                                    <form action="{{ route('admin.destroy', $admin->id) }}"
                                                        id="delete-form{{ $admin->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete({{ $admin->id }})"
                                                            class="btn btn-danger px-2">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
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
