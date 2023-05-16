{{-- <x-blockcomp> --}}
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Just For You</h3>
            <div class="block-header__divider"></div>

            <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left"
                    type="button"><svg width="7px" height="11px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg></button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg
                        width="7px" height="11px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg></button></div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            {{-- {{ $forYouProducts }} --}}
            @php
                $productsChunked = $forYouProducts->chunk(2); // Chunk products into pairs of two
            @endphp

            <div class="owl-carousel">
                @foreach ($productsChunked as $productsRow)
                    <div class="block-products-carousel__column">
                        @foreach ($productsRow as $product)
                            <div class="block-products-carousel__cell">
                                <div class="product-card">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="/frontend/images/sprite.svg#quickview-16"></use>
                                        </svg>
                                    </button>
                                    <div class="product-card__image">
                                        <a href="product.html">
                                            <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__prices">Ks
                                            {{ number_format($product->selling_price) }}</div>
                                        <div class="product-card__buttons product-btn">
                                            <a href="{{ route('cart.add', $product->id) }}"
                                                class="btn btn-primary product-card__addtocart" type="button">
                                                Add To Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
{{-- </x-blockcomp> --}}
