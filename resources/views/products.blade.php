@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>All Products</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options">
                            <div class="view-options">
                                <div class="view-options__control"><label for="">Sort By</label>
                                    <div><select class="form-control form-control-sm" name="" id="">
                                            <option value="">Default</option>
                                            <option value="">Name (A-Z)</option>
                                            <option value="">Price (from low-high)</option>
                                            <option value="">Price (from high-low)</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>


                        <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">

                            <div class="products-list__body">

                                @foreach ($products as $product)
                                    <div class="products-list__item">
                                        <div class="product-card">
                                            <div class="product-card__badges-list">
                                                <div class="product-card__badge product-card__badge--new">New</div>
                                            </div>
                                            <div class="product-card__image">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="product-card__actions">
                                                <div class="product-card__prices">
                                                    <span style="color: #3D464D">Price : </span></span> Ks
                                                    {{ $product->selling_price }}
                                                </div>

                                                <div class="product-card__buttons product-btn">
                                                    <a href="{{ route('cart.add', $product->id) }}"
                                                        class="btn btn-primary product-card__addtocart">
                                                        Add To Cart
                                                    </a>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $products->links('layouts.paginationlinks') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
