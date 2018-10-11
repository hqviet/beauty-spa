<!-- START MOBILE MENU AREA -->
<div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{ route('front.index') }}">{{ __('front.home') }}</a>
                                <li><a href="#">{{ __('front.services') }}</a>
                                    <ul>
                                        @foreach ($category_services as $cate)
                                        @if($cate->lang == session()->get('language'))
                                            <li><a href="#">{{ $cate->name }}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="blog.html">{{ __('front.products') }}</a>
                                    <ul>
                                        <li><a href="">Brands</a></li>
                                                @forelse ($brands as $brand)
                                                <li>
                                                    <a href="{{ route('front.product.list.brand', $brand->slug) }}">{{ $brand->name }}</a>
                                                </li>
                                                @empty
                                                @endforelse
                                        <li>Category</li>

                                                @forelse ($categories as $category)
                                                <li>
                                                    <a href="{{ route('front.product.list.category', $category->slug) }}">{{ $category->name }}</a>
                                                </li>
                                                @empty
                                                    
                                                @endforelse
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU AREA -->