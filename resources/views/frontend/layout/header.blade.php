<!-- START HEADER AREA -->
<header class="header-area header-wrapper">
        <!-- header-top-bar -->
        <div class="header-top-bar plr-185">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="call-us">
                            <p class="mb-0 roboto">

                            </p>

                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-link clearfix">
                            <ul class="link f-right">
                                @if ($user = Sentinel::getUser())
                                <li>
                                    <a href="{{ route('front.info-user') }}">
                                        <i class="zmdi zmdi-account"></i>
                                        {{$user->first_name}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.logout') }}">
                                        <i class="zmdi zmdi-power-setting"></i>
                                        {{ __('front.logout') }}
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{ route('front.login') }}">
                                        <i class="zmdi zmdi-lock"></i>
                                        {{ __('front.login') }}
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-middle-area -->
        <div id="sticky-header" class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="logo">
                                <a href="{{ route('front.index') }}">
                                    <img src="{{ asset('assets/front/img/logo/logo.png') }}" alt="main logo">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="{{ route('front.index') }}">{{ __('front.home') }}</a>
                                    </li>
                                    <li class="mega-parent"><a href="#">{{ __('front.services') }}</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link mega-menu-link-4  f-left">
                                                @foreach ($category_services as $cate)
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title"><a href="{{ route('front.category-service', $cate->categoryService->slug) }}">{{ $cate->name }}</a></li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mega-parent"><a href="#">{{ __('front.products') }}</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link f-left">
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Brands</li>
                                                    @forelse ($brands as $brand)
                                                    <li>
                                                        <a href="{{ route('front.product.list.brand', $brand->slug) }}">{{ $brand->name }}</a>
                                                    </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Categories</li>
                                                    @forelse ($categories as $category)
                                                    <li>
                                                        <a href="{{ route('front.product.list.category', $category->slug) }}">{{ $category->name }}</a>
                                                    </li>
                                                    @empty

                                                    @endforelse
                                                </ul>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title">Tablets</li>
                                                    <li>
                                                        <a href="">All Tablets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Smart tablets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Android Tablets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Windows Tablets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Refurbished Tablets</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Tablets Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Cases & Covers</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mega-menu-photo f-left">
                                                <a href="#">
                                                    <img src="{{ asset('assets/front/img/mega-menu/1.jpg') }}" alt="mega menu image">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <a href="about.html">{{ __('front.about_us') }}</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">{{ __('front.contact') }}</a>
                                    </li>
                                    <a href="?lang=vi" style="margin-right: 20px">
                                        <img class="flag" height="16px" src="{{ asset('assets/front/img/vn.svg') }}" alt="Vietnam Flag">
                                    </a>
                                    <a href="?lang=en">
                                        <img class="flag" height="16px" src="{{ asset('assets/front/img/gb.svg') }}" alt="United Kingdom Flag">
                                    </a>
                                </ul>
                            </nav>
                        </div>
                        <!-- header-search & total-cart -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="search-top-cart  f-right">
                                <!-- header-search -->
                                <div class="header-search f-left">
                                    <div class="header-search-inner">
                                        <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                        <form action="#">
                                            <div class="top-search-box">
                                                <input type="text" placeholder="Search here your product...">
                                                <button type="submit">
                                                    <i class="zmdi zmdi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- total-cart -->
                                <div class="total-cart f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="{{ route('front.cart.index') }}">
                                                <span class="cart-quantity">{{ Cart::count() }}</span><br>
                                                <span class="cart-icon">
                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER AREA -->
