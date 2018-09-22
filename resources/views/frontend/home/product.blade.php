<div class="product-tab-section mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="section-title text-left mb-40 pro-tab-menu">
                    <h2 class="uppercase">{{ __('front.product_list') }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="pro-tab-menu text-right">
                    <!-- Nav tabs -->
                    <ul class="" >
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($categories as $category)
                        <li class="{{ $i == 0 ? 'active' : '' }}"><a href="#{{ $category->slug }}" data-toggle="tab">{{ $category->name }}</a></li>
                        @php
                            $i = 1;
                        @endphp
                        @empty
                        @endforelse    
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-tab">
            <!-- Tab panes -->
            <div class="tab-content">
                @php
                    $i = 0;
                @endphp
                <!-- popular-product start -->
                @forelse ($categories as $category)
                <div class="tab-pane {{ $i == 0 ? 'active' : '' }}" id="{{ $category->slug }}">
                    <div class="row">
                        <!-- product-item start -->
                        @php
                           $j = 0;
                        @endphp
                        @forelse ($products as $product)
                            @if ($product->category->slug == $category->slug && $product->quantity > 0 && $j < $limit)
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="{{ asset('assets/front/img/product/7.jpg') }}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{ route('front.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ {{ $product->price }}</h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a class="quick-view" href="#"  data-product='{!! json_encode($product) !!}'><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a class="add-to-cart" href="javascript:void(0);" title="Add to cart" data-id="{{ $product->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @php
                                $j++;
                            @endphp
                            @endif
                        @empty
                            
                        @endforelse
                        <!-- product-item end -->
                    </div>
                </div>
                @php
                    $i = 1;
                @endphp
                @empty
                    
                @endforelse
                <!-- popular-product end -->
               
            </div>
        </div>
    </div>
</div>


    
