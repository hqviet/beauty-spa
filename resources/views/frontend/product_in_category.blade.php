@extends('frontend.layout.app')
@section('title', 'Products in brand')
@section('content')
<div id="page-content" class="page-wrapper mt-80">
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs-inner mb-80">
                        <h2 class="text-center">{{ $category_result }}</h2>
                    </div>
                </div>

                <div class="col-md-9 col-md-push-3 col-xs-12">

                    <div class="shop-content">
                        <!-- shop-option start -->
                        <div class="shop-option box-shadow mb-30 clearfix">
                            <!-- Nav tabs -->
                            <ul class="shop-tab f-left" role="tablist">
                                <li class="active">
                                    <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                </li>
                            </ul>
                            <!-- short-by -->
                            <div class="short-by f-left text-center">
                                <span>Sort by :</span>
                                <select>
                                    <option value="volvo">Newest items</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                            <!-- showing -->
                            <div class="showing f-right text-right">
                                <span>Showing : 01-09 of 17.</span>
                            </div>
                        </div>
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div role="tabpanel" class="tab-pane" id="grid-view">
                                <div class="row">
                                    @forelse ($products as $product)
                                    <!-- product-item start -->
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">
                                                    <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/front/img/product/7.jpg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">{{
                                                        $product->name }}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <h3 class="pro-price">{{ $product->price }}</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#productModal"
                                                            title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    @empty
                                    <p class="text-center text-danger">No product found!</p>
                                    @endforelse

                                </div>
                            </div>
                            <!-- list-view -->
                            <div role="tabpanel" class="tab-pane active" id="list-view">
                                <div class="row">
                                    @forelse ($products as $product)
                                    <!-- product-item start -->
                                    <div class="col-md-12">
                                        <div class="shop-list product-item">
                                            <div class="product-img">
                                                <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">
                                                    <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/front/img/product/7.jpg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <div class="clearfix">
                                                    <h6 class="product-title f-left">
                                                        <a href="{{ route('front.product.detail', ['slug' => $product->slug]) }}">{{
                                                            $product->name }}</a>
                                                    </h6>
                                                    <div class="pro-rating f-right">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                </div>
                                                <h6 class="brand-name mb-30">{{ $product->brand->name }}</h6>
                                                <h3 class="pro-price">$ {{ $product->price }}</h3>
                                                <p>{{ $product->desc_en }}</p>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="quick-view" data-product='{!! json_encode($product) !!}'><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="add-to-cart" data-id="{{ $product->id }}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    @empty
                                    <p class="text-center text-danger">No product found!</p>

                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content end -->
                        <!-- shop-pagination start -->
                        {{ $products->links('frontend.vendor.pagination') }}
                        <!-- shop-pagination end -->
                    </div>
                </div>
                <div class="col-md-3 col-md-pull-9 col-xs-12">
                    <!-- widget-search -->
                    <aside class="widget-search mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search here...">
                        </form>
                    </aside>
                    <!-- widget-categories -->
                    <aside class="widget widget-categories box-shadow mb-30">
                        <div id="cat-treeview" class="product-cat">
                            <ul class="treeview">
                                <li class="closed expandable">
                                    <div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#" class="">Brands</a>
                                    <ul class="treeview" style="">
                                        @forelse ($brands as $brand)
                                        <li><a href="{{ route('front.product.list.brand', ['slug' => $brand->slug]) }}" class="">{{ $brand->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                                <li class="open expandable">
                                    <div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#" class="">Categories</a>
                                    <ul class="treeview" style="">
                                        @forelse ($categories as $category)
                                        <li><a href="{{ route('front.product.list.category', ['slug' => $category->slug]) }}" class="">{{ $category->name }}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </aside>
                    <!-- shop-filter -->
                    <aside class="widget shop-filter box-shadow mb-30">
                        <h6 class="widget-title border-left mb-20">Price</h6>
                        <div class="price_filter">
                            <div class="price_slider_amount">
                                <input type="submit" value="You range :">
                                <input type="text" id="amount" name="price" placeholder="Add Your Price">
                            </div>
                            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 48.6667%;"></div><span
                                    class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span
                                    class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 48.6667%;"></span>
                            </div>
                        </div>
                    </aside>
                    <!-- widget-color -->

                    <!-- operating-system -->

                    <!-- widget-product -->

                </div>

            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</div>
@endsection