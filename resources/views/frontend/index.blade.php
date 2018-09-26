@extends('frontend.layout.app')
@section('title', 'Home')
@section('slider')
@include('frontend.layout.slider')
@endsection
@section('content')

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">
        <!-- FEATURED PRODUCT SECTION START -->
        @include('frontend.home.service')
        <!-- FEATURED PRODUCT SECTION END -->
        <!-- BY BRAND SECTION START-->
        @include('frontend.home.brand')
        <!-- BY BRAND SECTION END -->
        <!-- PRODUCT TAB SECTION START -->
        @include('frontend.home.product')
        <!-- PRODUCT TAB SECTION END -->
    </section>
    <!-- End page content -->
@endsection
