@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>Order has been confirmed</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 col-xl-9 mt-4 mt-lg-0">
                    <div class="card mb-0 align-items-center pt-4">
                        <div class="cart-title">
                            <h2>
                                <i class="fa-regular fa-circle-check text-success"></i>
                                <span class="text-success"> Thank you for your purchase! </span>
                            </h2>
                            <div style="text-align: center">
                                <p>Your order number is {{ $orderNumber }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0 align-items-center">
                        <table class="cart__table cart-table">
                            <tbody class="cart-table__body">
                                @foreach ($order->products as $product)
                                    <tr class="cart-table__row">

                                        <th class="cart-table__column cart-table__column--image">
                                            <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                alt="{{ $product->name }}">
                                        </th>
                                        <td class="cart-table__column cart-table__column--product text-right">
                                            Est.
                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(5)->format('d M') }}
                                            -
                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(8)->format('d M Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="accordion w-100" id="accordionExample">
                            <div class="card">
                                @php
                                    if ($order->address->township) {
                                        $deliFee = $order->address->township->deliFees->first()->fee;
                                    } else {
                                        $deliFee = 3000;
                                    }
                                    $total = $order->payment->paymentConfirm->total_amount;
                                @endphp
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo" style="text-decoration: none">
                                            <div class="d-flex">
                                                <span class="col-9">
                                                    Order Summary
                                                </span>
                                                <span class="col-3 text-right text-success" style="font-size: 1.5rem">
                                                    Ks {{ number_format($total, 0, '.', ',') }}
                                                </span>
                                                <span class="col-1">
                                                    <i class="fa-solid fa-caret-down text-end"></i>
                                                </span>
                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">

                                    <div class="px-4 py-3 row">
                                        <div class="col-6">
                                            Subtotal({{ $order->products->count() }} Items)
                                        </div>
                                        <div class="col-6" style="text-align:right">
                                            Ks {{ number_format($total - $deliFee, 0, '.', ',') }}
                                        </div>
                                    </div>
                                    <div class="px-4 pt-3 row">
                                        <div class="col-6">
                                            Shipping Fee
                                        </div>
                                        <div class="col-6" style="text-align:right">
                                            Ks {{ number_format($deliFee, 0, '.', ',') }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="px-4 py-2 row">
                                        <div class="col-6">
                                            Total Amount
                                        </div>
                                        <div class="col-6" style="text-align:right">
                                            Ks {{ number_format($total, 0, '.', ',') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-0 align-items-center p-3">
                        <div class="cart-title">
                            <a href="{{ route('index') }}" class="btn btn-warning">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
