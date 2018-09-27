@extends('frontend.layout.app')
@section('title', 'Home')
@section('content')
    <div id="page-content" class="page-wrapper">

        <!-- ERROR SECTION START -->
        <div class="error-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-404 box-shadow">
                            <img src="{{ asset('assets/front/img/others/error.jpg') }}" alt="">
                            <div class="go-to-btn btn-hover-2">
                                <a href="{{ route('front.index') }}">Go to Home Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ERROR SECTION END -->
    </div>
@endsection
