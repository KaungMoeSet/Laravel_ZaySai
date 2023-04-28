@extends('admin.layout.admin')
@section('title', 'Prodcut List')
@section('content')
    <section class="content-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right ">
                            <a href="{{ url('product/create') }}" class="btn btn-primary">New Product</a>
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
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Buying Price</th>
                                            <th>Selling Price</th>
                                            <th>Quantity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    @foreach ($product['images'] as $image)
                                                        <img src="{{ asset('images/' . $image) }}" alt="Image">
                                                    @endforeach
                                                </td>
                                                <td>{{ $product['name'] }}</td>
                                                <td>{{ $product['buying_price'] }}</td>
                                                <td>{{ $product['selling_price'] }}</td>
                                                <td>{{ $product['quantity']}}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{ url('product/' . $prodct->id . '/edit') }}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{ url('product/' . $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger px-2">
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
