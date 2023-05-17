@extends('admin.layout.admin')
@section('title', 'Prodcut List')
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
                                <table id="example1" class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Photo Qty</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Buying Price</th>
                                            <th>Selling Price</th>
                                            <th>Quantity</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                            <?php $productQty = 0; ?>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    @if ($product->images->isNotEmpty())
                                                        <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                            width="100px" height="100px" alt="Image">
                                                    @endif

                                                </td>
                                                <td style="text-align: center;">
                                                    @php
                                                        foreach ($product->images as $image) {
                                                            $productQty++;
                                                        }
                                                    @endphp
                                                    {{ $productQty }}
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td> {{ $product->sub_category->name }} </td>
                                                <td>Ks {{ number_format($product->buying_price) }}</td>
                                                <td>
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date == null)
                                                            Ks {{ number_format($price->selling_price) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $product->quantity }}</td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{ url('product/' . $product->id . '/edit') }}">
                                                        <button type="submit" class="btn btn-warning px-2 mx-2 edit_btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>

                                                    <form action="{{ url('product/' . $product->id) }}"
                                                        id="delete-form{{ $product->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete({{ $product->id }})"
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
