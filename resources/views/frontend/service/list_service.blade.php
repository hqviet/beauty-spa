@extends('frontend.layout.app')
@section('title', 'Service')
@section('content')
    <div class="blog-section mb-50">
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title text-left mb-40 pro-tab-menu">
                        <h2 class="uppercase">{{ __('front.featured_service') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @forelse($services as $service)
                <!-- blog-item start -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="blog-item">
                            <img src="{{ asset('assets/admin/image_service') }}/{{ $service->image }}" alt="" height="400px">
                            <div class="blog-desc">
                                <h6 class="blog-title"><a href="{{ route('front.service-detail', $service->slug) }}">{{ $service->s_name }}</a></h6>
                                <p>{!! $service->short_description !!}</p>
                                <div class="read-more">
                                    <a href="{{ route('front.service-detail', $service->slug) }}">Read more</a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>Share</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- blog-item end -->
                @empty
                    <div class="col-lg-12 alert alert-danger ">{{ __('front.service-not-found') }}</div>
                @endforelse
            </div>
            <div class="text-center">{{ $services->links() }}</div>

        </div>
    </div>
@endsection
