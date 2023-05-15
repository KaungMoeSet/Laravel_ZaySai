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
                                <tr class="cart-table__row">
                                    @foreach ($order->products as $product)
                                        <th class="cart-table__column cart-table__column--image">
                                            <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                alt="{{ $product->name }}">
                                        </th>
                                        <td class="cart-table__column cart-table__column--product text-right">
                                            Est.
                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(5)->format('d M') }} -
                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(8)->format('d M Y') }}
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
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
