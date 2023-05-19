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
            <ul class="mobile-links mobile-links--level--0" data-collapse
                data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="/" class="mobile-links__item-link">Home</a>
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
                            @foreach ($categories as $category)
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">
                                            {{ $category->name }}
                                        </a>
                                        @if ($category->subCategories->isNotEmpty())
                                            <button class="mobile-links__item-toggle" type="button"
                                                data-collapse-trigger>
                                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                    <use
                                                        xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7">
                                                    </use>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        @if ($category->subCategories->isNotEmpty())
                                            <ul class="mobile-links mobile-links--level--2">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <li class="mobile-links__item" data-collapse-item>
                                                        <div class="mobile-links__item-title">
                                                            <a href="{{ route('allProducts', ['subcategory' => $subCategory->id]) }}"
                                                                class="mobile-links__item-link">
                                                                {{ $subCategory->name }}
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="/products" class="mobile-links__item-link">All Products</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="/aboutUs" class="mobile-links__item-link">About Us</a>
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
