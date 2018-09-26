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
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <!-- Template color css -->
    <link href="{{ asset('assets/front/css/color/color-core.css') }}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">

    @yield('styles')

    <!-- Modernizr JS -->
    <script src="{{ asset('assets/front/js/vendor/modernizr-2.8.3.min.js') }}"></script>
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

    @yield('scripts')
</body>

</html>
