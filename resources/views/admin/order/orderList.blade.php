@extends('admin.layout.admin')
@section('title', 'Order List')
@section('content')
    <section class="content-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                        <h1>Order List</h1>
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
                            <div class="card-header">
                                <h3 class="card-title">Order List</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $order->order_number }}</td>
                                                <td>
                                                    {{ $order->payment->paymentConfirm->total_amount ?? '' }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($order->order_date)->format('Y/m/d') }}
                                                </td>
                                                <td class="text-center">
                                                    <span
                                                        class="p-2 rounded-pill
                                                @switch($order->order_status)
                                                @case('pending')
                                                    btn-secondary
                                                    @break
                                                @case('processing')
                                                    btn-warning
                                                    @break
                                                @case('rejected')
                                                    btn-danger
                                                    @break
                                                @case('delivered')
                                                    btn-success
                                                    @break
                                                @endswitch">
                                                        {{ $order->order_status }}
                                                    </span>
                                                </td>
                                                <td class="d-flex justify-content-end ">
                                                    <a href="{{ route('adminOrders.show', $order->id) }}">
                                                        <button type="submit" class="btn btn-warning edit_btn">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
