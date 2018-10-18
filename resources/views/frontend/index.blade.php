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
@section('scripts')
@if (session()->has('signup_success'))
<script>
    $.notify({
        // options
        icon: '',
        title: 'Bootstrap notify',
        message: 'Turning standard Bootstrap alerts into "notify" like notifications',
        url: '',
        target: '_blank'
    }, {
        // settings
        element: 'body',
        position: null,
        type: "success",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "top",
            align: "center"
        },
        offset: 20,
        spacing: 10,
        z_index: 99999,
        delay: 5000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button id="btn_close_growl" type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="message">{{ session('signup_success') }}</span>' +
            '</div>' +
            '</div>'
    });

</script>
@endif
@if (session()->has('checkout'))
<script>
    $.notify({
        // options
        icon: '',
        title: 'Bootstrap notify',
        message: 'Turning standard Bootstrap alerts into "notify" like notifications',
        url: '',
        target: '_blank'
    }, {
        // settings
        element: 'body',
        position: null,
        type: "{{ session('checkout')['status'] }}",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "top",
            align: "center"
        },
        offset: 20,
        spacing: 10,
        z_index: 99999,
        delay: 5000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button id="btn_close_growl" type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="message">{{ session('checkout')['message'] }}</span>' +
            '</div>' +
            '</div>'
    });

</script>
@endif
@endsection
