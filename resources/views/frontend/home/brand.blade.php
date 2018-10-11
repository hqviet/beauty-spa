<div class="by-brand-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left mb-40 pro-tab-menu">
                    <h2 class="uppercase">{{ __('front.by_brands') }}</h2>
                </div>
            </div>
        </div>
        <div class="by-brand-product">
            <div class="row active-by-brand slick-arrow-2">
                @forelse ($brands as $brand)
                <!-- single-brand-product start -->
                <div class="col-xs-12">
                    <div class="single-brand-product">
                        <a href="{{ route('front.product.list.brand',['slug' => $brand->slug]) }}"><img src="{{ asset('assets/front/img/product/5.jpg') }}" alt=""></a>
                        <h3 class="brand-title text-gray">
                            <a href="{{ route('front.product.list.brand',['slug' => $brand->slug]) }}">{{ $brand->name }}</a>
                        </h3>
                    </div>
                </div>
                <!-- single-brand-product end -->
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>

