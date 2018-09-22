@extends('frontend.layout.app')
@section('content')
<section id="page-content" class="page-wrapper">
    <div class=" plr-200 mb-80"></div> 
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            @if (session()->has('checkout_message'))
                @if(array_get(session('checkout_message'), 'status') == 'success')
                <h5 class="text-center text-success">{{ array_get(session('checkout_message'), 'msg') }}</h5>
                @endif
            @elseif (count($orderArray) > 0 )
            <div class="row">
                <div class="col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- checkout start -->
                        <div class="tab-pane active" id="checkout">
                            <div class="checkout-content box-shadow p-30">
                                <form action="{{ route('shop.checkout.handle') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <!-- billing details -->
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                @if ($errors->has('orderName'))
                                                <small class="text-danger">{{ $errors->first('orderName') }}</small>
                                                @endif
                                                <input type="text" name="orderName" placeholder="Name" value="{{ old('orderName') }}" required>
                                                @if ($errors->has('orderEmail'))
                                                <small class="text-danger">{{ $errors->first('orderEmail') }}</small>
                                                @endif
                                                <input type="text" name="orderEmail" placeholder="Email" required value="{{ old('orderEmail') }}">
                                                @if ($errors->has('orderPhone'))
                                                <small class="text-danger">{{ $errors->first('orderPhone') }}</small>
                                                @endif
                                                <input type="text" name="orderPhone" placeholder="Phone" required value="{{ old('orderPhone') }}">
                                                @if ($errors->has('orderHouseNumber'))
                                                <small class="text-danger">{{ $errors->first('orderHouseNumber') }}</small>
                                                @endif
                                                <input type="text" name="orderHouseNumber" placeholder="House number" required value="{{ old('orderHouseNumber') }}">
                                                @if ($errors->has('orderStreet'))
                                                <small class="text-danger">{{ $errors->first('orderStreet') }}</small>
                                                @endif
                                                <input type="text" name="orderStreet" placeholder="Street" required value="{{ old('orderStreet') }}">
                                                @if ($errors->has('orderProvince'))
                                                <small class="text-danger">{{ $errors->first('orderProvince') }}</small>
                                                @endif
                                                <input type="text" name="orderProvince" placeholder="Province" required value="{{ old('orderProvince') }}">
                                                @if ($errors->has('orderCity'))
                                                <small class="text-danger">{{ $errors->first('orderCity') }}</small>
                                                @endif
                                                <input type="text" name="orderCity" placeholder="City" required value="{{ old('orderCity') }}">
                                                @if ($errors->has('orderCountry'))
                                                <small class="text-danger">{{ $errors->first('orderCountry') }}</small>
                                                @endif
                                                <input type="text" name="orderCountry" placeholder="Country" required value="{{ old('orderCountry') }}">
                                                @if ($errors->has('orderNote'))
                                                <small class="text-danger">{{ $errors->first('orderNote') }}</small>
                                                @endif
                                                <textarea name="orderNote" class="custom-textarea" placeholder="Notes (optional)" >{{ old('orderNote') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- our order -->
                                            <div class="payment-details mb-50">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    <tbody>
                                                        @foreach ($orderArray as $item)
                                                        <tr>
                                                            <td class="td-title-1">{{ $item['name'] }} x {{ $item['qty'] }}</td>
                                                            <td class="td-title-2">${{ $item['total'] }}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="order-total">Order total</td>
                                                            <td class="order-total-price">${{ $orderTotal }}</td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                                <small class="f-right">Shipping fee not included</small>
                                            </div> 
                                            <!-- payment-method -->
                                            <div class="payment-method">
                                                <h6 class="widget-title border-left mb-20">payment method</h6>
                                                <select name="orderPaymentMethod" class="custom-select">
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                    <option value="cod">COD</option>
                                                </select>
                                            </div>
                                            <!-- payment-method end -->
                                            <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- checkout end -->
                    </div>
                </div>
            </div>
            @else 
            <h5 class="text-center" style="color: #ff7f00">You have no items in your shopping cart!</h5>
            @endif
        </div>
    </div>
    <!-- SHOP SECTION END -->             

</section>
@endsection