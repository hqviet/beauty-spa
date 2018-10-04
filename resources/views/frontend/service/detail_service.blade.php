@extends('frontend.layout.app')
@section('title', 'Service')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/mycss.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
    <section id="page-content" class="page-wrapper">
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
        <!-- ABOUT SECTION START -->
        <div class="about-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase mb-40">{{ __('front.services') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/admin/image_service/'.$service_t->service->image) }}" alt="" width="400px">
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="single-product-info">
                            <h3 class="text-black-1">{{ $service_t->name }}</h3>
                            <h6 class="brand-name-2"><h3 class="pro-price">{{ __('front.price').': '.$service_t->service->price }} VNĐ</h3></h6>
                            <!-- hr -->
                            <hr>
                            <!-- single-product-tab -->
                            <div class="single-product-tab">
                                <ul class="reviews-tab mb-20">
                                    <li class="active"><a href="#description" data-toggle="tab">{{ __('front.detail') }}</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        {!! $service_t->description !!}
                                    </div>
                                </div>
                                <a href="#boxservice" id="box" class="btn btn-info">{{ __('front.boxservice') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT SECTION END -->

        <!-- TEAM SECTION START -->
        <div class="team-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase">{{ __('front.team_member') }}</h2>
                            <h6 class="mb-40">{{ __('front.info_staff') }}</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="active-team-member">
                        <!-- team-member start -->
                        @for($i = 0; $i<10 ;$i++)
                        <div class="col-md-12">
                            <div class="team-member box-shadow bg-shape">
                                <div class="team-member-photo">
                                    <img src="{{ asset('assets/front/img/team/1.png') }}" alt="">
                                </div>
                                <div class="team-member-info pt-20">
                                    <h5 class="member-name"><a href="#">Nancy holland</a></h5>
                                    <p class="member-position">Chairman</p>
                                    <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                    <ul class="footer-social">
                                        <li>
                                            <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- team-member end -->
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <!-- TEAM SECTION END -->

        <!-- ADDRESS SECTION START -->
        <div class="address-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-pin"></i>
                            <h6>3 Phố Duy Tân, Dịch Vọng Hậu</h6>
                            <h6>Cầu Giấy, Hà Nội</h6>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-phone"></i>
                            <h6>(+84) 9682 97231</h6>
                            <h6>(+84) 9682 97231</h6>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-email"></i>
                            <h6>companyname@gmail.com</h6>
                            <h6>info@domainname.com</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADDRESS SECTION END -->

        <!-- GOOGLE MAP SECTION START -->

        <div class="google-map-section" id="boxservice">
            <div class="container-fluid">
                <div class="google-map plr-185">
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1tlAcoKx0FEXijayn0hYRP1ZyMDVtKL6w" width="100%" height="480"></iframe>
                </div>
            </div>
        </div>
        <!-- GOOGLE MAP SECTION END -->

        <!-- MESSAGE BOX SECTION START -->
        <div class="message-box-section mt--50 mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="message-box box-shadow white-bg">
                            <form action="{{ route('front.set-schedule') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                    </div>
                                    @if ($errors->any())
                                        <div class="col-md-12">
                                        @foreach ($errors->all() as $err)
                                            <p class="text-danger">{{ $err }}</p>
                                        @endforeach
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <input type="hidden" value="{{ $service_t->services_id }}" name="services_id">
                                    </div>
                                    @if ($user = Sentinel::getUser())
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Your name here" value="{{ $user->first_name.' '.$user->last_name }}" required
                                                   class=" {{$errors->has('name')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type=text name="email" placeholder="Your email here" value="{{ $user->email }}" required
                                                   class=" {{$errors->has('email')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" placeholder="Your phone here" value="{{ $user->phone }}" required
                                                   class=" {{$errors->has('phone')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="datepicker" name="date" placeholder="Date appointment" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Your name here" required
                                                   class=" {{$errors->has('name')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type=text name="email" placeholder="Your email here" required
                                                   class=" {{$errors->has('email')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" placeholder="Your phone here" required
                                                   class=" {{$errors->has('phone')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="datepicker" name="date" placeholder="Date appointment" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGE BOX SECTION END -->
    </section>
@endsection
@section('scripts')
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
    <script src="{{ asset('assets/front/js/map.js') }}"></script>
    <!-- ajax-mail js -->
    <script src="{{ asset('assets/front/js/ajax-mail.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $('#box').click(function(event){
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 800);
            // return false;
        });

        $('#datepicker').datepicker({
            autoclose: true,
            minDate: 0,
            dateFormat: 'yy-mm-dd'
        })
    </script>

@endsection
