@extends('layouts.home')

@section('content')
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
                            <h4 class="card-title">Delivery Information</h4>
                            @include('partials._addressBox')
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
                            <h4 class="card-title">Shipping & Billing</h4>
                            <table class="checkout__totals">
                                <tbody class="checkout__shippinhg-details">
                                    <tr>
                                        <td>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <b>Kaung Moe Set</b><br>
                                            <span><small>189/ 39St/ Kyauktada township, Yangon</small></span>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn text-primary edit-btn" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                Edit
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mr-3" id="exampleModalCenterTitle">
                                                                Shipping Address
                                                            </h5>
                                                            <h5 href="" class="modal-title pl-3 modal-new-address">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#addNewAddress">
                                                                    Add new address
                                                                </button>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table edit-table">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col">Full name</th>
                                                                        <th scope="col">Address</th>
                                                                        <th scope="col">Region</th>
                                                                        <th scope="col">Phone Number</th>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Kaung Moe Set</td>
                                                                        <td>Electric Planer Brandix KL370090G 300 Watts</td>
                                                                        <td>Yangon - Yangon City - Sanchaung</td>
                                                                        <td>09454922433</td>
                                                                        <td></td>
                                                                        <td>
                                                                            <span
                                                                                class="payment-methods__item-radio input-radio">
                                                                                <span class="input-radio__body">
                                                                                    <input class="input-radio__input"
                                                                                        name="checkout_payment_method"
                                                                                        type="radio" checked="checked">
                                                                                    <span
                                                                                        class="input-radio__circle"></span>
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kaung Moe Set</td>
                                                                        <td>Electric Planer Brandix KL370090G 300 Watts</td>
                                                                        <td>Yangon - Yangon City - Sanchaung</td>
                                                                        <td>09454922433</td>
                                                                        <td class="text-secondary"><small>Default address</small></td>
                                                                        <td>
                                                                            <span
                                                                                class="payment-methods__item-radio input-radio">
                                                                                <span class="input-radio__body">
                                                                                    <input class="input-radio__input"
                                                                                        name="checkout_payment_method"
                                                                                        type="radio" checked="checked">
                                                                                    <span
                                                                                        class="input-radio__circle"></span>
                                                                                </span>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            {{-- <table class="cart__table cart-table">
                                                                <thead class="cart-table__head">
                                                                    <tr class="cart-table__row">
                                                                        <th
                                                                            class="cart-table__column cart-table__column--name">
                                                                            Full name</th>
                                                                        <th
                                                                            class="cart-table__column cart-table__column--product">
                                                                            Address</th>
                                                                        <th
                                                                            class="cart-table__column cart-table__column--price">
                                                                            Region</th>
                                                                        <th
                                                                            class="cart-table__column cart-table__column--price">
                                                                            Phone Number</th>
                                                                        <th
                                                                            class="cart-table__column cart-table__column--select">
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="cart-table__body">
                                                                    <tr class="">
                                                                        <td
                                                                            class="cart-table__column cart-table__column--name">
                                                                            <span>Kaung Moe Set</span>
                                                                        </td>
                                                                        <td
                                                                            class="cart-table__column cart-table__column--product">
                                                                            <span href="#"
                                                                                class="cart-table__product-name">Electric
                                                                                Planer
                                                                                Brandix KL370090G 300
                                                                                Watts</span>
                                                                        </td>
                                                                        <td class="cart-table__column cart-table__column--price"
                                                                            data-title="Price">
                                                                            $699.00</td>
                                                                        <td class="cart-table__column cart-table__column--quantity"
                                                                            data-title="Quantity">
                                                                            <div class="input-number">
                                                                                Qty: 1
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            class="cart-table__column cart-table__column--remove">
                                                                            <button type="button"
                                                                                class="btn btn-light btn-sm btn-svg-icon"><svg
                                                                                    width="12px" height="12px">
                                                                                    <use
                                                                                        xlink:href="/frontend/images/sprite.svg#cross-12">
                                                                                    </use>
                                                                                </svg></button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> --}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Add new Address Modal -->
                                            <div class="modal fade" id="addNewAddress" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Add new shipping Address
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('partials._addressBox')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-phone-alt"></i>
                                            09-454922433
                                        </td>
                                        <td>
                                            <button type="button" class="btn text-primary edit-btn">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-envelope"></i>
                                            kaungmoeset@gmail.com
                                        </td>
                                        <td>
                                            <button type="button" class="btn text-primary edit-btn">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <button type="submit" class="btn btn-primary btn-xl btn-block">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
