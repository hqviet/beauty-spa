@extends('frontend.layout.app')
@section('title', 'Profile')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/mycss.css') }}">
@endsection
@section('content')
    <div class="blog-section mb-50">
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title"></h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">{{ __('front.home') }}</a></li>
                                    <li>{{ __('front.my_acount') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="my-account-content" id="accordion2">
                        <!-- My Personal Information -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#personal_info">{{ __('front.information') }}</a>
                                </h4>
                            </div>
                            <div id="personal_info" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <form action="{{ route('front.info-user') }}" method="POST">
                                        @csrf
                                        <div class="new-customers">
                                            <div class="p-30">
                                                <div class="row">
                                                    <div class="col-sm-12">
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
                                                               name="first_name" value="{{ $user->first_name }}"
                                                               class=" {{$errors->has('first_name')? 'has-error' : ''}}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="{{ __('front.last_name') }}"
                                                               name="last_name" value="{{ $user->last_name }}"
                                                               class="{{$errors->has('last_name')? 'has-error' : ''}}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="{{ __('front.address') }}"
                                                               name="address" value="{{ $user->address }}"
                                                               class="{{$errors->has('address')? 'has-error' : ''}}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="{{ __('front.phone') }}"
                                                               name="phone" value="{{ $user->phone }}"
                                                               class=" {{$errors->has('phone')? 'has-error' : ''}}">
                                                    </div>
                                                </div>
                                                <input type="email"  placeholder="{{ __('front.email_address') }}"  readonly
                                                       name="email" value="{{ $user->email }}" class="{{$errors->has('email')? 'has-error' : ''}}">

                                                <input type="password"  placeholder="{{ __('front.password') }}"
                                                       name="password" class="{{$errors->has('password')? 'has-error' : ''}}">

                                                <input type="password"  placeholder="{{ __('front.confirm_password') }}"
                                                       name="confirm_password" class="{{$errors->has('confirm_password')? 'has-error' : ''}}">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                                value="register">{{ __('front.save') }}</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                                type="reset">{{ __('front.clear') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- My billing details -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#My_order_info">{{ __('front.my_schedule') }}</a>
                                </h4>
                            </div>
                            <div id="My_order_info" class="panel-collapse collapse" role="tabpanel" >
                                <div class="panel-body">
                                    <form action="#">
                                        <!-- our order -->
                                        <div class="payment-details p-30">
                                            <table>
                                                <tr>
                                                    <th class="td-title-1">{{ __('front.services') }}</th>
                                                    <th class="td-title-2">{{ __('front.date') }}</th>
                                                </tr>
                                                @foreach($schedules as $schedule)
                                                <tr>
                                                    <td class="td-title-1">{{ $schedule->service->translation()->first()->name }}</td>
                                                    <td class="td-title-2">{{ $schedule->created_at }}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- My Order info -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#My_order_info">My Order info</a>
                                </h4>
                            </div>
                            <div id="My_order_info" class="panel-collapse collapse" role="tabpanel" >
                                <div class="panel-body">
                                    <form action="#">
                                        <!-- our order -->
                                        <div class="payment-details p-30">
                                            <table>
                                                <tr>
                                                    <td class="td-title-1">Dummy Product Name x 2</td>
                                                    <td class="td-title-2">$1855.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Dummy Product Name</td>
                                                    <td class="td-title-2">$555.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Cart Subtotal</td>
                                                    <td class="td-title-2">$2410.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Shipping and Handing</td>
                                                    <td class="td-title-2">$15.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="td-title-1">Vat</td>
                                                    <td class="td-title-2">$00.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="order-total">Order Total</td>
                                                    <td class="order-total-price">$2425.00</td>
                                                </tr>
                                            </table>
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Payment Method -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion2" href="#My_payment_method">Payment Method</a>
                                </h4>
                            </div>
                            <div id="My_payment_method" class="panel-collapse collapse" role="tabpanel" >
                                <div class="panel-body">
                                    <form action="#">
                                        <div class="new-customers p-30">
                                            <select class="custom-select">
                                                <option value="defalt">Card Type</option>
                                                <option value="c-1">Master Card</option>
                                                <option value="c-2">Paypal</option>
                                                <option value="c-3">Paypal</option>
                                                <option value="c-4">Paypal</option>
                                            </select>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text"  placeholder="Card Number">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"  placeholder="Card Security Code">
                                                </div>
                                                <div class="col-sm-6">
                                                    <select class="custom-select">
                                                        <option value="defalt">Month</option>
                                                        <option value="c-1">January</option>
                                                        <option value="c-2">February</option>
                                                        <option value="c-3">March</option>
                                                        <option value="c-4">April</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select class="custom-select">
                                                        <option value="defalt">Year</option>
                                                        <option value="c-4">2017</option>
                                                        <option value="c-1">2016</option>
                                                        <option value="c-2">2015</option>
                                                        <option value="c-3">2014</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">pay now</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">cancel order</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="submit-btn-1 mt-20 f-right btn-hover-1" type="submit" value="register">continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
