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
                    <form class="search__form" action="#"><input class="search__input" name="search"
                            placeholder="Search in Shop" aria-label="Site search" type="text" autocomplete="off">
                        <button class="search__button" type="submit"><svg width="20px" height="20px">
                                <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                            </svg></button>
                        <div class="search__border"></div>
                    </form>
                </div>
            </div>
            <div class="d-flex">
                <a href="/cart" class="indicator__button"><span class="indicator__area">
                        <i class="fa-solid fa-cart-shopping px-2"><span
                                class="indicator__value rounded-pill">3</span></i>

                </a>
                @auth
                    {{-- <a href="">
                        <span class="indicator__area">
                            <i class="fas fa-user-circle mobile_header_icon" style="font-size:2rem; color:#3D464D"></i>
                        </span>
                    </a> --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle mobile_header_icon" style="font-size:2rem; color:#3D464D"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                {{-- <a href="">
                    <span class="indicator__area">
                        <i class="fas fa-user-circle mobile_header_icon" style="font-size:2rem; color:#3D464D"></i>
                    </span>
                </a> --}}

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
                                            <li class="departments__item"><a href="#">Power
                                                    Machinery</a></li>
                                            <li class="departments__item"><a href="#">Measurement</a>
                                            </li>
                                            <li class="departments__item"><a href="#">Clothes & PPE</a>
                                            </li>
                                            <li class="departments__item"><a href="#">Plumbing</a></li>
                                            <li class="departments__item"><a href="#">Storage &
                                                    Organization</a>
                                            </li>
                                            <li class="departments__item"><a href="#">Welding &
                                                    Soldering</a>
                                            </li>
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

                                <li class="nav-links__item {{ request()->is('products') ? 'active' : '' }}">
                                    <a href="/products"><span>All Products</span></a>
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
