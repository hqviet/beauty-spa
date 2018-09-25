@extends('frontend.layout.app')
@section('title', 'Page not found')
@section('content')
<div class="error-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-404 box-shadow">
                    <img src="{{ asset('assets/front/img/error-404.png') }}" alt="">
                    <div class="go-to-btn btn-hover-2">
                        <a href="{{ route('front.index') }}">go to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection