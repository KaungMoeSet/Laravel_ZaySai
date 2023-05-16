@extends('admin.layout.admin')
@section('title', 'Payment Detail')
@section('content')
    <section class="content-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left inline w-100">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/order">Order List</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                        <h1>Order Detail</h1>
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
                            <div class="card-header">
                                <h3 class="card-title">Order Detail of
                                    <span class="text-primary"> {{ $order->order_number }} </span>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>
                                                {{ $order->address->name }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Order Products</th>
                                            <td>
                                                @foreach ($order->products as $product)
                                                    {{ $product->name }} - {{ $product->pivot->quantity }} &times;
                                                    {{ number_format($product->selling_price) }}<br>
                                                @endforeach

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Deli Fee</th>
                                            <td>Ks {{ $order->deli_fee }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td>
                                                Ks {{ $order->payment->paymentConfirm->total_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td>
                                                {{ $order->payment->paymentMethod->bank_name }} -
                                                {{ $order->payment->paymentMethod->acc_number }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Address</th>
                                            <td>
                                                {{ $order->address->address }}.,
                                                {{ $order->address->township->name ?? '' }},
                                                {{ $order->address->city->name }} City,
                                                {{ $order->address->city->region->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paid At</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($order->payment->paid_at)->format('Y/m/d') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Order At</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($order->order_date)->format('Y/m/d') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Order status</th>
                                            <td>
                                                <span
                                                    class="p-2 rounded-pill
                                                @switch($order->order_status)
                                                @case('pending')
                                                    btn-secondary
                                                    @break
                                                @case('processing')
                                                    btn-warning
                                                    @break
                                                @case('delivered')
                                                    btn-success
                                                    @break
                                                @endswitch">
                                                    {{ $order->order_status }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="row justify-content-end">
                                <a href="{{ route('adminOrders.index') }}" class="btn btn-secondary mx-2">
                                    Cancel
                                </a>

                                <a href="{{ route('adminOrders.processing', $order->id) }}"
                                    class="btn btn-warning p-2 mx-2">Processing</a>

                                <a href="{{ route('adminOrders.deliver', $order->id) }}"
                                    class="btn btn-success  mx-2">Deliver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
