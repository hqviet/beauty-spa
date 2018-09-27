@extends('frontend.layout.app')
@section('title', 'Login')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/mycss.css') }}">
@endsection
@section('content')
    <!-- BREADCRUMBS SETCTION START -->
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
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper">

        <!-- LOGIN SECTION START -->
        <div class="login-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="registered-customers">
                            <h6 class="widget-title border-left mb-50">{{ __('front.login') }}</h6>
                            <form action="{{ route('front.login') }}" method="POST">
                                @csrf
                                <div class="login-account p-30 box-shadow">
                                    <p>{{ __('front.message_login') }}</p>
                                    @if($errors->has('err'))<p class="text-danger">{{ $errors->first('err') }}</p>@endif
                                    <p class="text-danger">{{ $errors->first('emailLogin') }}</p>
                                    <p class="text-danger">{{ $errors->first('passwordLogin') }}</p>
                                    <input type="email" name="emailLogin" placeholder="{{ __('front.email_address') }}"
                                           class=" {{$errors->has('emailLogin')? 'has-error' : ''}}">

                                    <input type="password" name="passwordLogin" placeholder="{{ __('front.password') }}"
                                           class=" {{$errors->has('passwordLogin')? 'has-error' : ''}}">

                                    <p><small><a href="#">{{ __('front.forgot_password') }}</a></small></p>
                                    <button class="submit-btn-1 btn-hover-1" type="submit">{{ __('front.login') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- new-customers -->
                    <div class="col-md-6">
                        <div class="new-customers">
                            <form action="{{ route('front.register') }}" method="POST">

                                @csrf
                                <h6 class="widget-title border-left mb-50">{{ __('front.register_customers') }}</h6>
                                <div class="login-account p-30 box-shadow">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>{{ __('front.message_register') }}</p>
                                            <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                            <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                            <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="text" placeholder="{{ __('front.first_name') }}"
                                                   name="first_name" value="{{ old('first_name') }}" required
                                                   class=" {{$errors->has('first_name')? 'has-error' : ''}}">

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="{{ __('front.last_name') }}"
                                                   name="last_name" value="{{ old('last_name') }}" required
                                                   class="{{$errors->has('last_name')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="{{ __('front.address') }}"
                                                   name="address" value="{{ old('address') }}" required
                                                   class="{{$errors->has('address')? 'has-error' : ''}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="{{ __('front.phone') }}"
                                                   name="phone" value="{{ old('phone') }}" required
                                                   class=" {{$errors->has('first_name')? 'has-error' : ''}}">
                                        </div>
                                    </div>
                                    <input type="email"  placeholder="{{ __('front.email_address') }}" required
                                           name="email" value="{{ old('email') }}" class="{{$errors->has('email')? 'has-error' : ''}}">

                                    <input type="password"  placeholder="{{ __('front.password') }}" required
                                           name="password" class="{{$errors->has('password')? 'has-error' : ''}}">

                                    <input type="password"  placeholder="{{ __('front.confirm_password') }}" required
                                           name="confirm_password" class="{{$errors->has('confirm_password')? 'has-error' : ''}}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                    value="register">{{ __('front.register') }}</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                    type="reset">{{ __('front.clear') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN SECTION END -->

    </div>
    <!-- End page content -->
@endsection
