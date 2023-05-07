<header class="site__header d-lg-none">
    <div class="mobile-header mobile-header--sticky mobile-header--stuck">
        <div class="mobile-header__panel">
            <div class="container">
                <div class="mobile-header__body"><button class="mobile-header__menu-button"><svg width="18px"
                            height="14px">
                            <use xlink:href="/frontend/images/sprite.svg#menu-18x14"></use>
                        </svg></button>
                    <a class="mobile-header__logo" href="/">
                        <span>ZaySai <i class="fas fa-store"></i></span>
                    </a>
                    <div class="mobile-header__search">
                        <form class="mobile-header__search-form" action="#">
                            <input class="mobile-header__search-input" name="search" placeholder="Search in Shop"
                                aria-label="Site search" type="text" autocomplete="off">
                            <button class="mobile-header__search-button mobile-header__search-button--submit"
                                type="submit">
                                <svg width="20px" height="20px">
                                    <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                                </svg>
                            </button>
                            <button class="mobile-header__search-button mobile-header__search-button--close"
                                type="button">
                                <svg width="20px" height="20px">
                                    <use xlink:href="/frontend/images/sprite.svg#cross-20"></use>
                                </svg>
                            </button>
                            <div class="mobile-header__search-body"></div>
                        </form>
                    </div>
                    <div class="mobile-header__indicators">
                        <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                            <button class="indicator__button">
                                <span class="indicator__area">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="indicator indicator--mobile d-sm-flex d-none">
                            <a href="wishlist.html" class="indicator__button">
                                <span class="indicator__area">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/frontend/images/sprite.svg#heart-20"></use>
                                    </svg>
                                    <span class="indicator__value">0</span>
                                </span>
                            </a>
                        </div>
                        <div class="indicator indicator--mobile">
                            <a href="/cart" class="indicator__button">
                                <span class="indicator__area">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/frontend/images/sprite.svg#cart-20"></use>
                                    </svg>
                                    <span class="indicator__value">3</span>
                                </span>
                            </a>
                        </div>
                        <div class="indicator indicator--mobile">
                            @auth
                            <li class="nav-item dropdown" style="list-style: none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle mobile_header_icon" style="font-size:2rem; color:#3D464D"></i>
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
                                <a href="/login">
                                    <span class="indicator__area">
                                        <i class="fa-solid fa-right-to-bracket mobile_header_icon"></i>
                                    </span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
