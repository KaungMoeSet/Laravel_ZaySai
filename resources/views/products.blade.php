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
                                <div class="view-options__divider"></div>
                                <div class="view-options__legend">Showing 6 of 98 products</div>
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

                                {{-- <div class="products-list__item">
                                    <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                                width="16px" height="16px">
                                                <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">Hot</div>
                                        </div>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="/frontend/images/products/product-2.jpg" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Undefined</a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__prices">$1,019.00</div>
                                            <div class="product-card__buttons product-btn"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="products-list__item">
                                    <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                                width="16px" height="16px">
                                                <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--sale">Sale
                                            </div>
                                        </div>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="/frontend/images/products/product-4.jpg" alt=""></a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Drill Series</a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__prices"><span
                                                    class="product-card__new-price">$949.00</span> <span
                                                    class="product-card__old-price">$1189.00</span></div>

                                            <div class="product-card__buttons product-btn">
                                                <button class="btn btn-primary product-card__addtocart" type="button">
                                                    Add To Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="products-view__pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#"
                                        aria-label="Previous"><svg class="page-link__arrow page-link__arrow--left"
                                            aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-left-8x13"></use>
                                        </svg></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2 <span
                                            class="sr-only">(current)</span></a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link page-link--with-arrow" href="#"
                                        aria-label="Next"><svg class="page-link__arrow page-link__arrow--right"
                                            aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-8x13"></use>
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
