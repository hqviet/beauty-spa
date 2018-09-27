<!-- START SLIDER AREA -->
<div class="slider-area  plr-185  mb-80">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="row">
                <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                    @for ($i = 0; $i < 3; $i++) <!-- layer-1 Start -->
                        <div class="col-md-12">
                            <div class="layer-1">
                                <div class="slider-img">
                                    <img style="" src="{{ asset('assets/front/images/banner.jpg') }}" alt="">
                                </div>
                                <div class="slider-info gray-bg">
                                    <div class="slider-info-inner">
                                        <h1 class="slider-title-1 text-uppercase text-black-1">{{ str_random(20) }}</h1>
                                        <div class="slider-brief text-black-2">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem minima veniam dolorum eaque numquam iusto recusandae? Minima, aliquid sit a laboriosam eaque temporibus est? Vitae, expedita laboriosam. Ipsa, tempora quaerat?</p>
                                        </div>
                                        <a href="#" class="button extra-small button-black">
                                            <span class="text-uppercase">Buy now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- layer-1 end -->

                        @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SLIDER AREA -->
