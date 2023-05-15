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
                                                <td class="" style="text-shadow: 1px .5px .3px #FFD333">
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
                                        {{-- <tr>
                                            <th>Payment/Bank Type</th>
                                            <td>
                                                <select id="my-select" name="bank_name" class="form-control">
                                                    <option value="" disabled selected>Choose payment bank type</option>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                        <option>
                                                            {{ $paymentMethod->bank_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="help-inline">
                                                    @error('bank_name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <th>Account Number</th>
                                            <td>
                                                <select id="my-select" name="account" class="form-control">
                                                    <option value="" disabled selected>Choose account number</option>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                        <option value="{{ $paymentMethod->id }}">
                                                            {{ $paymentMethod->bank_name }} -
                                                            {{ $paymentMethod->acc_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="help-inline">
                                                    @error('account')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Screenshot </th>
                                            <td>
                                                <input name="paymentScreenshot" type="file"
                                                    value="{{ old('paymentScreenshot') }}" class="form-control-file">
                                                @error('paymentScreenshot')
                                                    <span class="help-inline">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                @php
                                    $itemQty = 0;
                                    $subTotal = 0;

                                    foreach ($cart_data as $product) {
                                        $itemQty += $product->quantity;
                                    }
                                @endphp
                                <h4 class="card-title">Order Summery</h4>
                                <table class="checkout__totals">
                                    <tbody class="cart-table__body">




                                        <tr class="cart-table__row">
                                            <td>
                                                Subtotal ( {{ $itemQty }} items and shipping fee included)
                                            </td>
                                            <td>
                                                @php
                                                    $total = 0;
                                                    if (!$user->addresses->isEmpty()) {
                                                        $defaultAddress = $user->addresses->where('setDefault', true)->first();
                                                        if ($defaultAddress->township) {
                                                            $deliFee = $defaultAddress->township->deliFees->first()->fee;
                                                        } else {
                                                            $deliFee = 3000;
                                                        }
                                                    } else {
                                                        $deliFee = 0;
                                                    }
                                                @endphp
                                                @foreach ($cart_data as $product)
                                                    @php
                                                        $total += $product->quantity * $product->selling_price;
                                                    @endphp
                                                @endforeach
                                                <input type="text" class="form_input data_input"
                                                    value="{{ $total + $deliFee }}" readonly> Ks

                                                <input type="text" name="totalAmt" value="{{ $total }}" hidden>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Total Amount</th>
                                            <td>
                                                {{ $total + $deliFee }} Ks
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p class="text-danger">
                                    order confirm ပြီးရင်ပြန် cancel လို့မရပါ
                                </p>
                                <button type="submit" class="btn btn-primary btn-xl btn-block "
                                    {{ $itemQty == 0 ? 'hidden' : '' }}>
                                    Confirm Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
