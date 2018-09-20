<div class="blog-section mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="section-title text-left mb-40 pro-tab-menu">
                    <h2 class="uppercase">{{ __('front.featured_service') }}</h2>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="pro-tab-menu text-right">
                    <!-- Nav tabs -->
                    <a href="{{ route('front.service') }}">{{ __('front.readmore') }} </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <!-- blog-item start -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item">
                    <img src="{{ asset('assets/admin/image_service') }}/{{ $service->image }}" alt="" height="400px">
                    <div class="blog-desc">
                        <h5 class="blog-title"><a href="{{ route('front.service-detail', $service->slug) }}">{{ $service->s_name }}</a></h5>
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
            @endforeach
        </div>
    </div>
</div>
