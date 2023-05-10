<h4 class="card-title">Shipping & Billing</h4>
<table class="checkout__totals">
    <tbody class="checkout__shippinhg-details">
        @foreach ($user->addresses as $shippingAddress)
            @if ($shippingAddress->setDefault)
                <tr>
                    <td>
                        <i class="fas fa-map-marker-alt"></i>
                        <b>{{ $shippingAddress->name }}</b><br>
                        <span>
                            <small>
                                {{ $shippingAddress->address }}.,
                                {{ $shippingAddress->township->name ?? '' }},
                                {{ $shippingAddress->city->name }} City,
                                {{ $shippingAddress->city->region->name }}
                            </small>
                        </span>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn text-primary edit-btn" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Edit
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fas fa-phone-alt"></i>
                        {{ $shippingAddress->phoneNumber }}
                    </td>
                    <td>
                        <button type="button" class="btn text-primary edit-btn">
                            Edit
                        </button>
                    </td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td>
                <i class="fas fa-envelope"></i>
                {{ $user->email }}
            </td>
            <td>
                <button type="button" class="btn text-primary edit-btn">
                    Edit
                </button>
            </td>
        </tr>
    </tbody>
</table>

<!-- Edit Shipping -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mr-3" id="exampleModalCenterTitle">
                    Shipping Address
                </h5>
                <h5 href="" class="modal-title pl-3 modal-new-address">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewAddress">
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
                    <tbody class="checkout__shipping-details" id="shipping-details">
                        <form id="address-form" action="{{ route('checkout.update-addresses') }}" method="POST">
                            @csrf
                            @foreach ($user->addresses as $shippingAddress)
                                <tr>
                                    <td>{{ $shippingAddress->name }}</td>
                                    <td>{{ $shippingAddress->address }}</td>
                                    <td>
                                        {{ $shippingAddress->city->region->name }} -
                                        {{ $shippingAddress->city->name }} City -
                                        {{ $shippingAddress->township->name ?? '' }}
                                    </td>
                                    <td> {{ $shippingAddress->phoneNumber }}</td>
                                    <td class="text-secondary">
                                        @if ($shippingAddress->setDefault)
                                            <small>Default address</small>
                                        @endif
                                    </td>
                                    <td class="form-check">
                                        <span class="payment-methods__item-radio input-radio">
                                            <span class="input-radio__body">
                                                <input class="input-radio__input"
                                                    name="shipping_address_id" type="radio"
                                                    value="{{ $shippingAddress->id }}"
                                                    {{ $shippingAddress->setDefault ? 'checked' : '' }}>
                                                <span class="input-radio__circle"></span>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Add new Address Modal -->
<div class="modal fade" id="addNewAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
            </div>
        </div>
    </div>
</div>