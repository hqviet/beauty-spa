@extends('frontend.layout.app')
@section('title', 'Service')
@section('content')
    <section id="page-content" class="page-wrapper">
        <!-- ABOUT SECTION START -->
        <div class="about-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase mb-40">Service detail</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/admin/image_service/'.$service_t->service->image) }}" alt="" width="400px">
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="single-product-info">
                            <h3 class="text-black-1">Dummy Product Name </h3>
                            <h6 class="brand-name-2">brand name</h6>
                            <!-- hr -->
                            <hr>
                            <!-- single-product-tab -->
                            <div class="single-product-tab">
                                <ul class="reviews-tab mb-20">
                                    <li class="active"><a href="#description" data-toggle="tab">description</a></li>
                                    <li><a href="#information" data-toggle="tab">information</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="information">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, neque fugit inventore quo dignissimos est iure natus quis nam illo officiis,  deleniti consectetur non ,aspernatur.</p>
                                        <p>rerum blanditiis dolore dignissimos expedita consequatur deleniti consectetur non exercitationem.</p>
                                    </div>
                                </div>
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
                            <h2 class="uppercase">team member</h2>
                            <h6 class="mb-40">There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="active-team-member">
                        <!-- team-member start -->
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
                        <!-- team-member start -->
                        <div class="col-md-12">
                            <div class="team-member box-shadow bg-shape">
                                <div class="team-member-photo">
                                    <img src="{{ asset('assets/front/img/team/2.png') }}" alt="">
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
                        <!-- team-member start -->
                        <div class="col-md-12">
                            <div class="team-member box-shadow bg-shape">
                                <div class="team-member-photo">
                                    <img src="{{ asset('assets/front/img/team/3.png') }}" alt="">
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
                        <!-- team-member start -->
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
                        <!-- team-member start -->
                        <div class="col-md-12">
                            <div class="team-member box-shadow bg-shape">
                                <div class="team-member-photo">
                                    <img src="{{ asset('assets/front/img/team/2.png') }}" alt="">
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
                            <h6>House 06, Road 01, Katashur, Mohammadpur,</h6>
                            <h6>Dhaka-1207, Bangladesh</h6>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-phone"></i>
                            <h6>(+880) 1945 082759</h6>
                            <h6>(+880) 1945 082759</h6>
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

        <div class="google-map-section">
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
                            <form id="contact-form" action="mail.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="name" placeholder="Your name here">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="email" placeholder="Your email here">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" placeholder="Subject here">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" placeholder="Your phone here">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
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

@endsection
