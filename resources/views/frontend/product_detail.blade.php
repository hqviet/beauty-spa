@extends('frontend.layout.app')
@section('title', 'Product detail')
@section('content')
<section id="page-content" class="page-wrapper">
<div class="shop-section mb-80 mt-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- single-product-area start -->
                <div class="single-product-area mb-80">
                    <div class="row">
                        <!-- imgs-zoom-area start -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="imgs-zoom-area">
                                <img id="zoom_03" src="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/front/img/product/6.jpg') }}" data-zoom-image="{{ $product->image ? asset('uploads/products/' . $product->image) : asset('assets/front/img/product/6.jpg') }}" alt="">
                            </div>
                        </div>
                        <!-- imgs-zoom-area end -->
                        <div class="col-md-1 col-sm-1 col-xs-0"></div>
                        <!-- single-product-info start -->
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="single-product-info">
                                <h3 class="text-black-1">{{ $product->name }}</h3>
                                <h6 class="brand-name-2">{{ $product->brand->name }}</h6>
                                <!-- hr -->
                                <hr>
                                <!-- single-product-tab -->
                                <div class="single-product-tab">
                                    <ul class="reviews-tab mb-20">
                                        <li class="active">
                                            <a href="#description" data-toggle="tab">description</a>
                                        </li>
                                        <li>
                                            <a href="#reviews" data-toggle="tab">reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="description">
                                           {{ $product->desc_en }}
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="reviews">
                                            <!-- reviews-tab-desc -->
                                            <div class="reviews-tab-desc">
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="{{ asset('assets/shop/img/author/1.jpg') }}" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading">
                                                                    <a href="#">Gerald Barnes</a>
                                                                </h6>
                                                                <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                            </div>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li>
                                                                        <a href="#">Reply</a>
                                                                    </li>
                                                                    <li>/</li>
                                                                    <li>
                                                                        <a href="#">Delate</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                            accumsan egestas .</p>
                                                    </div>
                                                </div>
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="{{ asset('assets/shop/img/author/2.jpg') }}" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading">
                                                                    <a href="#">Gerald Barnes</a>
                                                                </h6>
                                                                <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                            </div>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li>
                                                                        <a href="#">Reply</a>
                                                                    </li>
                                                                    <li>/</li>
                                                                    <li>
                                                                        <a href="#">Delate</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                            accumsan egestas .</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  hr -->
                                <hr>
                                <!-- single-pro-color-rating -->
                                <div class="single-pro-color-rating clearfix">
                                    <div class="sin-pro-color f-left">
                                        <p class="color-title f-left">Color</p>
                                        <div class="widget-color f-left">
                                            <ul>
                                                <li class="color-1">
                                                    <a href="#"></a>
                                                </li>
                                                <li class="color-2">
                                                    <a href="#"></a>
                                                </li>
                                                <li class="color-3">
                                                    <a href="#"></a>
                                                </li>
                                                <li class="color-4">
                                                    <a href="#"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-rating sin-pro-rating f-right">
                                        <a href="#" tabindex="0">
                                            <i class="zmdi zmdi-star"></i>
                                        </a>
                                        <a href="#" tabindex="0">
                                            <i class="zmdi zmdi-star"></i>
                                        </a>
                                        <a href="#" tabindex="0">
                                            <i class="zmdi zmdi-star"></i>
                                        </a>
                                        <a href="#" tabindex="0">
                                            <i class="zmdi zmdi-star-half"></i>
                                        </a>
                                        <a href="#" tabindex="0">
                                            <i class="zmdi zmdi-star-outline"></i>
                                        </a>
                                        <span class="text-black-5">( 27 Rating )</span>
                                    </div>
                                </div>
                                <!-- hr -->
                                <hr>
                                <!-- plus-minus-pro-action -->
                                <div class="plus-minus-pro-action">
                                    <div class="sin-pro-action f-right">
                                        <a class="button small mb-20 add-to-cart" data-id="{{ $product->id }}" href="javascript:void(0);"><span>Add to cart</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-info end -->
                    </div>
                </div>
                <!-- single-product-area end -->
            </div>
        </div>
    </div>
</div>
</section>
@endsection