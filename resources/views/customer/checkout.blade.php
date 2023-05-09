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
                        <div class="card-body">
                            @if ($user->addresses->isEmpty())
                                @include('partials._addressBox')
                            @endif
                        </div>
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
                                        <tr class="cart-table__row">
                                            <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                                        src="/frontend/images/products/product-1.jpg" alt=""></a>
                                            </td>
                                            <td class="cart-table__column cart-table__column--product">
                                                <span href="#" class="cart-table__product-name">Electric Planer
                                                    Brandix KL370090G 300
                                                    Watts</span>
                                            </td>
                                            <td class="cart-table__column cart-table__column--price" data-title="Price">
                                                $699.00</td>
                                            <td class="cart-table__column cart-table__column--quantity"
                                                data-title="Quantity">
                                                <div class="input-number">
                                                    Qty: 1
                                                </div>
                                            </td>
                                            <td class="cart-table__column cart-table__column--remove"><button type="button"
                                                    class="btn btn-light btn-sm btn-svg-icon"><svg width="12px"
                                                        height="12px">
                                                        <use xlink:href="/frontend/images/sprite.svg#cross-12"></use>
                                                    </svg></button></td>
                                        </tr>
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
                                    <tr>
                                        <td>Electric Planer Brandix KL370090G 300 Watts × 2</td>
                                        <td>$1,398.00</td>
                                    </tr>
                                    <tr>
                                        <td>Undefined Tool IRadix DPS3000SY 2700 watts × 1</td>
                                        <td>$849.00</td>
                                    </tr>
                                    <tr>
                                        <td>Brandix Router Power Tool 2017ERXPK × 3</td>
                                        <td>$3,630.00</td>
                                    </tr>
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>$5,877.00</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Fee</th>
                                        <td>$25.00</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td>$5,882.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="submit" class="btn btn-primary btn-xl btn-block"
                                {{ $user->addresses->isEmpty() ? 'disabled' : '' }}>
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
