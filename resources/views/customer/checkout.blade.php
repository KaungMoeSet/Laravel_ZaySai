@extends('layouts.home')

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
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        @if ($user->addresses->isEmpty())
                            @include('partials._addressBox')
                        @endif
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <h4 class="card-title">Shipping Details</h4>
                            <div class="form-group">
                                ရန်ကုန်ကလွဲပြီးကျန်မြို့တွေကို ကားဂိတ်တင်ပေးပါတယ်။
                            </div>
                            <div class="form-group">
                                <table class="cart__table cart-table">
                                    <thead class="cart-table__head">
                                        <tr class="cart-table__row">
                                            <th class="cart-table__column cart-table__column--image">Image</th>
                                            <th class="cart-table__column cart-table__column--product">Product</th>
                                            <th class="cart-table__column cart-table__column--price">Price</th>
                                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                            <th class="cart-table__column cart-table__column--remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table__body">
                                        @foreach ($cart_data as $product)
                                            <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-table__column cart-table__column--product">
                                                    <span href="#" class="cart-table__product-name">Electric Planer
                                                        {{ $product->name }}
                                                    </span>
                                                </td>
                                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                                    Ks {{ $product->selling_price }}
                                                </td>
                                                <td class="cart-table__column cart-table__column--quantity"
                                                    data-title="Quantity">
                                                    <div class="input-number">
                                                        Qty: {{ $product->quantity }}
                                                    </div>
                                                </td>
                                                <td class="cart-table__column cart-table__column--remove">
                                                    <form method="POST"
                                                        action="{{ route('checkout.destroy', $product->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="12px" height="12px">
                                                                <use xlink:href="/frontend/images/sprite.svg#cross-12">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body">
                            @if (!$user->addresses->isEmpty())
                                @include('partials._shippingAddress')
                            @endif

                            <h4 class="card-title">Order Summery</h4>
                            <table class="checkout__totals">
                                <thead class="checkout__totals-header">
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="checkout__totals-products">
                                    @php
                                        $subTotal = 0;
                                    @endphp
                                    @foreach ($cart_data as $product)
                                        <tr>
                                            <td>{{ $product->name }} × {{ $product->quantity }}</td>
                                            <td>Ks {{ $product->quantity * $product->selling_price }}</td>
                                        </tr>
                                        @php
                                            $subTotal += $product->quantity * $product->selling_price;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>Ks {{ $subTotal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Fee</th>
                                        <td>
                                            @php
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
                                            Ks {{ $deliFee }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cart_data as $product)
                                                @php
                                                    $total += $product->quantity * $product->selling_price;
                                                @endphp
                                            @endforeach
                                            {{ $total + $deliFee }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="submit" class="btn btn-primary btn-xl btn-block"
                                {{ $user->addresses->isEmpty() ? 'disabled' : ($subTotal == 0 ? 'disabled' : '') }}>
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
