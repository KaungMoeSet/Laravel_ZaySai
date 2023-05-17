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
                            <li class="breadcrumb-item"><a href="/paymentConfirm">Payment List</a></li>
                            <li class="breadcrumb-item active">Payment Detail</li>
                        </ol>
                        <h1>Payment Detail</h1>
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
                                <h3 class="card-title">Payment Detail of Order
                                    <span class="text-primary"> {{ $paymentConfirm->payment->order->order_number }} </span>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>
                                                {{ $paymentConfirm->payment->order->address->name }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Order Products</th>
                                            <td>
                                                @foreach ($paymentConfirm->payment->order->products as $product)
                                                    {{ $product->name }} - {{ $product->pivot->quantity }} &times;
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date == null)
                                                            {{ number_format($price->selling_price) }}
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                @endforeach

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Deli Fee</th>
                                            <td>Ks
                                                {{ number_format($paymentConfirm->payment->order->deli_fee, 0, '.', ',') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td>Ks
                                                {{ number_format($paymentConfirm->total_amount, 0, '.', ',') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td>
                                                {{ $paymentConfirm->payment->paymentMethod->bank_name }} -
                                                {{ $paymentConfirm->payment->paymentMethod->acc_number }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Payment Screenshot</th>
                                            <td>
                                                <img src="{{ asset('storage/img/' . $paymentConfirm->payment->payment_screenshot) }}"
                                                    width="70%" height="auto">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Address</th>
                                            <td>
                                                {{ $paymentConfirm->payment->order->address->address }}.,
                                                {{ $paymentConfirm->payment->order->address->township->name ?? '' }},
                                                {{ $paymentConfirm->payment->order->address->city->name }} City,
                                                {{ $paymentConfirm->payment->order->address->city->region->name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Payment Status</th>
                                            <td class="">
                                                <span
                                                    class="p-2 rounded-pill
                                                @switch($paymentConfirm->confirm_status)
                                                @case('pending')
                                                    btn-primary
                                                    @break
                                                @case('accepted')
                                                    btn-success
                                                    @break
                                                @case('rejected')
                                                    btn-danger
                                                    @break
                                                @endswitch">
                                                    {{ $paymentConfirm->confirm_status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Accept/Reject by Admin</th>
                                            <td>
                                                {{ $paymentConfirm->admin->name ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paid At</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($paymentConfirm->payment->paid_at)->format('Y/m/d') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Accept/Reject At</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($paymentConfirm->confirm_cancel_date)->format('Y/m/d') }}
                                            </td>
                                        </tr>
                                        @if ($paymentConfirm->confirm_status == 'rejected')
                                            <tr>
                                                <th>Reject Reason</th>
                                                <td>
                                                    {{ $paymentConfirm->reject_reason ?? '' }}
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="row justify-content-end">
                                <a href="{{ route('paymentConfirm.index') }}" class="btn btn-secondary col-1 mx-2">
                                    Cancel
                                </a>
                                <a href="{{ route('paymentConfirm.reject', $paymentConfirm->id) }}"
                                    class="btn btn-danger col-1 mx-2">Reject</a>

                                <a href="{{ route('paymentConfirm.accept', $paymentConfirm->id) }}"
                                    class="btn btn-success col-1 mx-2">Accept</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
