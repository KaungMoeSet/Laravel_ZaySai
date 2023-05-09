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
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mr-3" id="exampleModalCenterTitle">
                                    Shipping Address
                                </h5>
                                <h5 href="" class="modal-title pl-3 modal-new-address">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addNewAddress">
                                        Add new address
                                    </button>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                <span class="payment-methods__item-radio input-radio">
                                                    <span class="input-radio__body">
                                                        <input class="input-radio__input" name="checkout_payment_method"
                                                            type="radio" checked="checked">
                                                        <span class="input-radio__circle"></span>
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kaung Moe Set</td>
                                            <td>Electric Planer Brandix KL370090G 300 Watts</td>
                                            <td>Yangon - Yangon City - Sanchaung</td>
                                            <td>09454922433</td>
                                            <td class="text-secondary"><small>Default
                                                    address</small></td>
                                            <td>
                                                <span class="payment-methods__item-radio input-radio">
                                                    <span class="input-radio__body">
                                                        <input class="input-radio__input" name="checkout_payment_method"
                                                            type="radio" checked="checked">
                                                        <span class="input-radio__circle"></span>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @include('partials._addressBox')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
