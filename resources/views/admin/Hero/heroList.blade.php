@extends('admin.layout.admin')
@section('title', 'Hero List')
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
                            <li class="breadcrumb-item active">Hero Carousel</li>
                        </ol>
                        <h1>Hero Carousel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ">
                            <a href="{{ url('heroCarousel/create') }}" class="btn btn-primary">New Hero</a>
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
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>link</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($heroes as $hero)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/img/' . $hero_image->image_name) }}"
                                                        width="100px" height="100px">
                                                </td>
                                                <td>{{ $hero->title }}</td>
                                                <td>$ {{ $hero->description }}</td>
                                                <td>$ {{ $hero->link }}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{ url('hero/' . $hero->id . '/edit') }}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{ url('hero/' . $hero->id) }}"
                                                        id="delete-form{{ $hero->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete({{ $hero->id }})"
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
