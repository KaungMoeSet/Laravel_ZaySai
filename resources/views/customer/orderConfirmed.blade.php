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
                                <p >Your order number is {{ $orderNumber }} </p>
                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
