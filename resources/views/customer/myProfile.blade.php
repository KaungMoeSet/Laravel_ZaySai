@extends('customer.layout.profile')

@section('content1')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h4>Manage My Account</h4>
            </div>
        </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-title row mt-3 mx-2 mb-0">
                            <h5 class="col-10">
                                Personal Profile
                            </h5>
                            <a href="{{ route('profile.edit', $user->id) }}" class="btn text-primary edit-btn col-2">
                                Edit
                            </a>
                        </div>
                        <div class="card-body mx-2 mb-0">
                            <b style="color: #212121">  {{ $user->name }} </b> <br>
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-title row mt-3 mx-2 mb-0">
                            <h5 class="col-10">
                                Address Book
                            </h5>
                            <a href="{{ route('profile.addressBook') }}" class="btn text-primary edit-btn">
                                Edit
                            </a>
                        </div>
                        <div class="mx-4">
                            <b style="color: #757575;">DEFAULT SHIPPING ADDRESS</b>
                        </div>
                        <div class="card-body mx-2 mb-0">
                            @foreach ($user->addresses as $shippingAddress)
                                @if ($shippingAddress->setDefault)
                                    <b style="color: #212121"> {{ $shippingAddress->name }} </b> <br>
                                    <small>
                                        {{ $shippingAddress->address }} <br>
                                        {{ $shippingAddress->township->name ?? '' }} -
                                        {{ $shippingAddress->city->name }} City -
                                        {{ $shippingAddress->city->region->name }} <br>
                                        {{ $shippingAddress->phoneNumber }}
                                    </small>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
