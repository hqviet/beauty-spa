<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front/img/icon/favicon.png') }}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{ asset('assets/front/lib/css/nivo-slider.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/core.css') }}">
    <!-- T+-->
    <link rel="stylesheet" href="{{ asset('assets/front/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <!-- Template color css -->
    <link href="{{ asset('assets/front/css/color/color-core.css') }}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('assets/front/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @yield('styles')
</head>

<body>
    <div class="wrapper">
        @include('frontend.layout.header')
        @include('frontend.layout.mobile_menu')
        @yield('slider')
        @yield('content')
        @include('frontend.layout.footer')
        @include('frontend.layout.quickview')
    </div>

    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('assets/front/js/vendor/jquery-3.1.1.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{ asset('assets/front/lib/js/jquery.nivo.slider.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('assets/front/js/plugins.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('assets/front/js/main.js') }}"></script>
    <script src="{{ asset('assets/front/js/notify/bootstrap-notify.js') }}"></script>
    <script>
        $('.quick-view').click(function (e) {
            e.preventDefault();
            var product = $(this).data('product');
            if (product.image.length == 0) {
                product.image = "{{ asset('assets/front/img/product/quickview.jpg') }}";
            }
            $('#product-name').text(product.name);
            $('#product-price').text('$ ' + product.price);
            $('#product-img').attr('src', "{{ asset('uploads/products') }}" + "/" + product.image);
            $('#add-to-cart').attr('data-id', product.id);
            $('#product-description').text(product.description);
            $('#productModal').modal('toggle');
        });

        $('.add-to-cart').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('front.cart.add') }}',
                type: 'post',
                data: {
                    _token: '{{ Session::token() }}',
                    product_id: $(this).data('id')
                },
                success: function (data) {
                    console.log(data);
                    $('.cart-quantity').empty().text(data.totalItems);
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
                        type: data.status,
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
                        delay: 3000,
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
                            '<span data-notify="message">' + data.message + '</span>' +
                        '</div>' +
                        '</div>'
                    });
                },
                error: function () {
                    alert('fail');
                }
            });
            $('#productModal').modal('hide');
        });

    </script>
    @yield('scripts')

</body>

</html>
