@extends('layouts.home')

@section('content')
    <div class="block" style="margin-top: 2rem">
        <div class="container">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content">
                    <!-- .product__gallery -->
                    <div class="product__gallery">
                        <div class="product-gallery">
                            <div class="product-gallery__featured">
                                <div class="owl-carousel" id="product-image">
                                    @foreach ($product->images as $images)
                                        <img src="{{ asset('storage/img/' . $images->image_name) }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-gallery__carousel">
                                <div class="owl-carousel" id="product-carousel">
                                    @foreach ($product->images as $images)
                                        <img class="product-gallery__carousel-image"
                                            src="{{ asset('storage/img/' . $images->image_name) }}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- .product__gallery / end -->
                    <!-- .product__info -->
                    <div class="product__info">
                        <div class="product__wishlist-compare">
                            <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                data-placement="right" title="Wishlist">
                                <svg width="16px" height="16px">
                                    <use xlink:href="/frontend/images/sprite.svg#wishlist-16"></use>
                                </svg>
                            </button>
                            <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                data-placement="right" title="Compare">
                                <svg width="16px" height="16px">
                                    <use xlink:href="/frontend/images/sprite.svg#compare-16"></use>
                                </svg>
                            </button>
                        </div>
                        <h1 class="product__name">{{ $product->name }}</h1>
                        <div class="product__description">{{ $product->description }}</div>
                        <ul class="product__meta">
                            <li class="product__meta-availability">
                                Availability: <span class="text-success">In Stock</span>
                            </li>
                        </ul>
                    </div><!-- .product__info / end -->
                    <!-- .product__sidebar -->
                    <div class="product__sidebar">
                        <div class="product__prices">Ks {{ $product->selling_price }}</div><!-- .product__options -->
                        <form method="POST" action="{{ route('cart.addProduct' , $product->id) }}" class="product__options">
                            @csrf

                            <div class="form-group product__option">
                                <div class="product__actions">
                                    <label class="product__option-label-qty" for="product-quantity">Quantity</label>
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity"
                                                class="input-number__input form-control form-control-lg" type="number"
                                                min="1" value="1" name="quantity">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="product__actions my-3 align-start" style="">
                                    <div class="product__actions-item--addtocart col-12 col-md-5 ">
                                        <a class="btn btn-secondary btn-lg btn-block" type="button">
                                            Buy Now
                                        </a>
                                    </div>
                                    <div class="product__actions-item--addtocart col-12 col-md-5">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-block">
                                            <input type="text" name="id" value="{{ $product->id }}" hidden>
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                        </form><!-- .product__options / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
