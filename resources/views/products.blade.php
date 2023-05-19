@extends('layouts.home')

@section('content')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h1>All Products</h1>
            </div>
        </div>
    </div>

    @include('partials._features')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options">
                            <div class="view-options">
                                <div class="view-options__control"><label for="">Sort By</label>
                                    <div>
                                        <form action="{{ route('index') }}" method="GET" id="filterForm">
                                            <select class="form-select" name="filter_option" id="filterOptionSelect"
                                                onchange="submitFilterForm()">
                                                <option value="0">Default</option>
                                                <option value="1">Name (A-Z)</option>
                                                <option value="2">Price (from low-high)</option>
                                                <option value="3">Price (from high-low)</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">

                            <div class="products-list__body">

                                @forelse ($products as $product)
                                    <div class="products-list__item">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    <img style="height: 230px; width: 100%;"
                                                        src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
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
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date == null)
                                                            {{ number_format($price->selling_price) }}
                                                        @endif
                                                    @endforeach
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
                                @empty
                                    <div class="w-100 text-center ">
                                        <h3> <span class="text-danger">"{{ request()->search }}"</span> data is not exist
                                        </h3>
                                    </div>
                                @endforelse

                            </div>
                        </div>

                        <div class="d-flex justify-content-center pt-3">
                            {{ $products->links('layouts.paginationlinks') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitFilterForm() {
            document.getElementById("filterForm").submit();
        }
    </script>
    
@endsection
