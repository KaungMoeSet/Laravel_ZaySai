<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZaySai</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>ZaySai</title>
    <link rel="icon" type="image/png" href="/frontend//frontend/images/favicon.png"><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/owl-carousel-2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js -->
    <script src="/frontend/jquery-3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="/frontend/owl-carousel-2.3.4/owl.carousel.min.js"></script>
    <script src="/frontend/nouislider-12.1.0/nouislider.min.js"></script>
    <script src="/frontend/js/number.js"></script>
    <script src="/frontend/js/main.js"></script>
    <script src="/frontend/svg4everybody-2.1.9/svg4everybody.min.js"></script>
    <script>
        svg4everybody();
    </script>
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="/frontend/fontawesome-5.6.1/css/all.min.css">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="/frontend/fonts/stroyka/stroyka.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-97489509-6');
    </script>
</head>

<body>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->

    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="/frontend/images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="index.html" class="mobile-links__item-link">Home</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="#" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="#" class="mobile-links__item-link">Power Tools</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="#" class="mobile-links__item-link">Machine Tools</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="/products" class="mobile-links__item-link">All Products</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="/aboutUs" class="mobile-links__item-link">About</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="/contactUs" class="mobile-links__item-link">Contact Us</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->

    <!-- site -->
    <!-- mobile site__header -->
    <div class="site">
        @include('partials._mobileheader')
        <!-- mobile site__header / end -->

        <!-- desktop site__header -->
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
                            <form class="search__form" action="#"><input class="search__input" name="search" placeholder="Search in Shop" aria-label="Site search" type="text" autocomplete="off"> <button class="search__button" type="submit"><svg width="20px" height="20px">
                                        <use xlink:href="/frontend/images/sprite.svg#search-20"></use>
                                    </svg></button>
                                <div class="search__border"></div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="cart.html" class="indicator__button"><span class="indicator__area">
                                <i class="fa-solid fa-cart-shopping px-2"><span class="indicator__value rounded-pill">3</span></i>

                        </a>
                        <a href="/login" class="px-2 btn btn-outline-secondary fs-6 px-3 mx-1">Log in</a>
                        <a href="/register" class="px-2 btn btn-dark bg-dark text-light fs-6 px-3 mx-1">Sign up</a>
                    </div>
                </div>
                <div class="site-header__nav-panel">
                    <div class="nav-panel">
                        <div class="nav-panel__container container">

                            <div class="nav-panel__row">

                                <div class="nav-panel__departments"><!-- .departments -->
                                    <div class="departments" data-departments-fixed-by="">
                                        <div class="departments__body">
                                            <div class="departments__links-wrapper">
                                                <ul class="departments__links">
                                                    <li class="departments__item"><a href="#">Power Machinery</a></li>
                                                    <li class="departments__item"><a href="#">Measurement</a></li>
                                                    <li class="departments__item"><a href="#">Clothes & PPE</a></li>
                                                    <li class="departments__item"><a href="#">Plumbing</a></li>
                                                    <li class="departments__item"><a href="#">Storage & Organization</a>
                                                    </li>
                                                    <li class="departments__item"><a href="#">Welding & Soldering</a>
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
                                        <li class="nav-links__item">
                                            <a href="/"><span>Home</span></a>
                                        </li>

                                        <li class="nav-links__item">
                                            <a href="/products"><span>All Products</span></a>
                                        </li>

                                        <li class="nav-links__item">
                                            <a href="/aboutUs"><span>About</span></a>
                                        </li>

                                        <li class="nav-links__item">
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
        <!-- desktop site__header / end -->

        <!-- site__body -->
        <div class="site__body">
            @yield('content')
        </div>
        <!-- site__body / end -->

        <!-- site__footer -->
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <div class="footer-contacts__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.</div>
                                    <ul class="footer-contacts__contacts">
                                        <li>
                                            <i class="footer-contacts__icon fas fa-globe-americas"></i>
                                            39St. Kyauktada, No.189, Yangon, Myanmar
                                        </li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> 
                                            <a href="mailto:kaungmoeset@gmail.com">kaungmoeset@gmail.com</a>
                                        </li>
                                        <li>
                                            <i class="footer-contacts__icon fas fa-mobile-alt"></i> 
                                            <a href="tel:+95-9955667645">+95-9955667645</a>,
                                            <a href="tel:+95-9955667645">+95-9454922433</a>
                                        </li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sun 8:00am - 8:00pm
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="/aboutUs" class="footer-links__link">About
                                                Us</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                                                Information</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy
                                                Policy</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">FAQ</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Contact
                                                Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor
                                        lorem pulvinar mollis felis at lacinia.</div>
                                    <form action="#" class="footer-newsletter__form"><label class="sr-only" for="footer-newsletter-address">Email Address</label> <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address..."> <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on
                                        social networks</div>
                                    <ul class="footer-newsletter__social-links">
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i class="fa-brands fa-telegram"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--viber">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i class="fa-brands fa-viber"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="footer-site-info pt-2 text-start pt-1 text-center">
                            Copyright © 2023 Kaung Moe Set All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- site__footer / end -->
    </div><!-- site / end -->
</body>

</html>
