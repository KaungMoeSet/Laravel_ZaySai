<header class="site__header d-lg-block d-none shadow sticky-top">
    <div class="site-header">

        <div class="site-header__middle container">
            <div class="site-header__logo">
                <a href="/">
                    <span class="website_name fs-2">ZaySai <i class="fas fa-store"></i></span>
                </a>
            </div>

            <div class="site-header__search">
                <div class="search">
                    <form method="GET" class="search__form" action="{{ route('allProducts') }}">
                        <input class="search__input" name="search" placeholder="Search in Shop"
                            aria-label="Site search" type="text" autocomplete="off">
                        <button class="search__button" type="submit">
                            <svg width="20px" height="20px">
                                <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                            </svg>
                        </button>
                        <div class="search__border"></div>
                    </form>
                </div>
            </div>

            <div class="d-flex">
                @auth
                    <a href="/cart" class="indicator__button">
                        <span class="indicator__area">
                            @php
                                $cart = session('cart');
                                $totalQuantity = 0;
                            @endphp

                            @if ($cart)
                                @foreach ($cart as $item)
                                    @php
                                        $totalQuantity += $item['quantity'];
                                    @endphp
                                @endforeach
                            @endif
                            <i class="fa-solid fa-cart-shopping px-2"><span class="indicator__value rounded-pill">@if (session('cart') == null)0 @else{{ $totalQuantity }} @endif
                                </span>
                            </i>
                    </a>
                @endauth

                @auth
                    <li class="nav-item dropdown" style="list-style: none">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle mobile_header_icon" style="font-size:2rem; color:#3D464D"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                My Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <a href="/login" class="px-2 btn btn-outline-secondary fs-6 px-3 mx-1">Log in</a>
                    <a href="/register" class="px-2 btn btn-dark bg-dark text-light fs-6 px-3 mx-1">Sign up</a>
                @endauth

            </div>
        </div>
        <div class="site-header__nav-panel">
            <div class="nav-panel">
                <div class="nav-panel__container container">

                    <div class="nav-panel__row">

                        <div class="nav-panel__departments">
                            <!-- .departments -->
                            <div class="departments" data-departments-fixed-by="">
                                <div class="departments__body">
                                    <div class="departments__links-wrapper">
                                        <ul class="departments__links">
                                            @foreach ($categories as $category)
                                                <li class="departments__item departments__item--menu">
                                                    <a href="">
                                                        {{ $category->name }}
                                                        @if ($category->subCategories->isNotEmpty())
                                                            <svg class="departments__link-arrow" width="6px"
                                                                height="9px">
                                                                <use
                                                                    xlink:href="/frontend/images/sprite.svg#arrow-rounded-right-6x9">
                                                                </use>
                                                            </svg>
                                                        @endif
                                                    </a>
                                                    <div class="departments__menu">
                                                        <!-- .menu -->
                                                        @if ($category->subCategories->isNotEmpty())
                                                            <ul class="menu menu--layout--classic">
                                                                @foreach ($category->subCategories as $subCategory)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('allProducts', ['subcategory' => $subCategory->id]) }}">
                                                                            {{ $subCategory->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                        <!-- .menu / end -->
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <button class="departments__button"> Shop By Category
                                    <i class="fa-solid fa-caret-down"></i>
                                </button>
                            </div><!-- .departments / end -->
                        </div>

                        <!-- .nav-links -->
                        <div class="nav-panel__nav-links nav-links">
                            <ul class="nav-links__list">
                                <li class="nav-links__item {{ request()->is('/') ? 'active' : '' }}">
                                    <a href="/"><span>Home</span></a>
                                </li>

                                <li class="nav-links__item {{ request()->is('aboutUs') ? 'active' : '' }}">
                                    <a href="/aboutUs"><span>About</span></a>
                                </li>

                                <li class="nav-links__item  {{ request()->is('contactUs') ? 'active' : '' }}">
                                    <a href="/contactUs"><span>Contact Us</span></a>
                                </li>

                            </ul>
                        </div><!-- .nav-links / end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
