@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>Order Confirm</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container">
            <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    @method('POST')
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="card mb-lg-0">
                            <div class="card-body">
                                <h4 class="card-title">Available Payments</h4>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                        @foreach ($paymentMethods as $paymentMethod)
                                            <tr>
                                                <td style="text-align: start">
                                                    <img src="{{ asset('storage/img/' . $paymentMethod->image) }}"
                                                        width="auto" height="50px">
                                                </td>
                                                <td>
                                                    {{ $paymentMethod->acc_name }}
                                                </td>
                                                <td class="text-warning" style="text-shadow: 1px .5px .3px rgb(96, 96, 96)">
                                                    {{ $paymentMethod->acc_number }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="card-title">Your Payment Info</h4>
                                <table class="checkout__totals">
                                    <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Your Account Name </th>
                                            <td>
                                                <input name="accountName" type="text" class="form_input"
                                                    value="{{ old('photo') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Your Account Number </th>
                                            <td>
                                                <input name="accountName" type="text" class="form_input"
                                                    value="{{ old('photo') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Screenshot </th>
                                            <td>
                                                <input name="accountName" type="file" value="{{ old('photo') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <h4 class="card-title">Order Summery</h4>
                                <table class="checkout__totals">
                                    <tbody class="cart-table__body">
                                        @php
                                            $itemQty = 0;
                                            $subTotal = 0;
                                        @endphp

                                        @foreach ($cart_data as $product)
                                            @php
                                                $itemQty += $product->quantity;
                                            @endphp
                                        @endforeach

                                        <tr class="cart-table__row">
                                            <td>
                                                Subtotal ( {{ $itemQty }} itms and shipping fee included)
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Total Amount</th>
                                            <td>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a type="submit" class="btn btn-primary btn-xl btn-block">
                                    Confirm Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
