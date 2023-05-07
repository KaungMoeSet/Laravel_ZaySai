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
                                        {{-- <a href="" target="_blank"> --}}
                                        <img src="{{ asset('storage/img/' . $images->image_name) }}" alt="">
                                        {{-- </a> --}}
                                    @endforeach
                                    {{-- <a href="/frontend/images/products/product-16.html" target="_blank">
                                        <img src="/frontend/images/products/product-16.jpg" alt="">
                                    </a>
                                    <a href="/frontend/images/products/product-16-1.html" target="_blank">
                                        <img src="/frontend/images/products/product-16-1.jpg" alt="">
                                    </a><a href="/frontend/images/products/product-16-2.html" target="_blank"><img
                                            src="/frontend/images/products/product-16-2.jpg" alt=""> </a><a
                                        href="/frontend/images/products/product-16-3.html" target="_blank"><img
                                            src="/frontend/images/products/product-16-3.jpg" alt=""> </a><a
                                        href="/frontend/images/products/product-16-4.html" target="_blank"><img
                                            src="/frontend/images/products/product-16-4.jpg" alt=""></a> --}}
                                </div>
                            </div>
                            <div class="product-gallery__carousel">
                                <div class="owl-carousel" id="product-carousel">
                                    @foreach ($product->images as $images)
                                        {{-- <a href="#" class="product-gallery__carousel-item"> --}}
                                        <img class="product-gallery__carousel-image"
                                            src="{{ asset('storage/img/' . $images->image_name) }}" alt="">
                                        {{-- </a> --}}
                                    @endforeach
                                    {{-- <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image"
                                            src="/frontend/images/products/product-16-1.jpg" alt="">
                                    </a>
                                    <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image"
                                            src="/frontend/images/products/product-16-2.jpg" alt="">
                                    </a>
                                    <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image"
                                            src="/frontend/images/products/product-16-3.jpg" alt="">
                                    </a>
                                    <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image"
                                            src="/frontend/images/products/product-16-4.jpg" alt="">
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div><!-- .product__gallery / end -->
                    <!-- .product__info -->
                    <div class="product__info">
                        <div class="product__wishlist-compare"><button type="button"
                                class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right"
                                title="Wishlist"><svg width="16px" height="16px">
                                    <use xlink:href="/frontend/images/sprite.svg#wishlist-16"></use>
                                </svg></button> <button type="button" class="btn btn-sm btn-light btn-svg-icon"
                                data-toggle="tooltip" data-placement="right" title="Compare"><svg width="16px"
                                    height="16px">
                                    <use xlink:href="/frontend/images/sprite.svg#compare-16"></use>
                                </svg></button></div>
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
                        <form class="product__options">
                            <div class="form-group product__option">
                                <div class="product__actions">
                                    <label class="product__option-label-qty" for="product-quantity">Quantity</label>
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity"
                                                class="input-number__input form-control form-control-lg" type="number"
                                                min="1" value="1">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="product__actions my-3 align-start" style="">
                                    <div class="product__actions-item--addtocart col-12 col-md-5 ">
                                        <button class="btn btn-secondary btn-lg btn-block" type="button">
                                            Buy Now
                                        </button>
                                    </div>
                                    {{-- <form action="{{ route('cart.store') }}" method="POST"> --}}
                                        @csrf
                                        <div class="product__actions-item--addtocart col-12 col-md-5">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-primary btn-lg btn-block"
                                                type="submit">
                                                Add To Cart
                                            </button>
                                        </div>
                                    {{-- </form> --}}
                                </div>
                        </form><!-- .product__options / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
