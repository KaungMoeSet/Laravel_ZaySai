@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>Shopping Cart</h1>
            </div>
        </div>
    </div>
    <div class="cart block">
        <div class="container">
            <table class="cart__table cart-table">
                <thead class="cart-table__head">
                    <tr class="cart-table__row">
                        <th class="cart-table__column cart-table__column--image">Image</th>
                        <th class="cart-table__column cart-table__column--product">Product</th>
                        <th class="cart-table__column cart-table__column--price">Price</th>
                        <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                        <th class="cart-table__column cart-table__column--total">Total</th>
                        <th class="cart-table__column cart-table__column--remove"></th>
                    </tr>
                </thead>
                <tbody class="cart-table__body">
                    @php
                        $subTotal = 0;
                        $itemsCount = 0;
                    @endphp
                    @foreach ($cart_data as $product)
                        <tr class="cart-table__row">
                            <td class="cart-table__column cart-table__column--image">
                                <a href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                        alt="">
                                </a>
                            </td>
                            <td class="cart-table__column cart-table__column--product">
                                <a href="{{ route('products.show', $product->id) }}" class="cart-table__product-name">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td class="cart-table__column cart-table__column--price" data-title="Price">
                                Ks {{ $product->selling_price }}
                            </td>
                            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                <div class="input-number">
                                    <a href="{{ route('cart.update', [$product->id, $product->quantity + 1]) }}"
                                        class="input-number__add"></a>
                                    <input type="text" value="{{ $product->quantity }}" name="quantity"
                                        id="product-quantity" class="input-number__input" min="1" max="10"
                                        readonly>
                                    <a href="{{ route('cart.update', [$product->id, $product->quantity - 1]) }}"
                                        class="input-number__sub"></a>

                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--total" data-product-id="{{ $product->id }}"
                                data-title="Total">
                                {{ $product->quantity * $product->selling_price }}
                            </td>
                            <td class="cart-table__column cart-table__column--remove">
                                <form method="POST" action="{{ route('cart.remove', $product->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-sm btn-svg-icon">
                                        <svg width="12px" height="12px">
                                            <use xlink:href="/frontend/images/sprite.svg#cross-12"></use>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @php
                            $itemsCount++;
                            $subTotal += $product->quantity * $product->selling_price;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="cart__actions">
                <a href="{{ url('/allProducts') }}" class="btn btn-primary text-end">Continue Shopping</a>
            </div>
            <div class="row justify-content-end pt-5">
                <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Cart Totals</h3>
                            <table class="cart__totals">
                                <thead class="cart__totals-header">
                                    <tr>
                                        <th>Subtotal ({{ $itemsCount }} items)</th>
                                        <td>Ks {{ $subTotal }}</td>
                                    </tr>
                                </thead>
                                <tfoot class="cart__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td>Ks {{ $subTotal }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a class="btn btn-primary btn-xl btn-block cart__checkout-button {{ $subTotal == 0 ? 'disabled' : '' }}"
                                href="{{ route('checkout.index') }}">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
