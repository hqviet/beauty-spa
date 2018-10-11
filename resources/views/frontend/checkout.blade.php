@extends('frontend.layout.app')
@section('title', 'Checkout')
@section('content')
<section id="page-content" class="page-wrapper">
    <div class=" plr-200 mb-80"></div> 
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            @if (session()->has('checkout'))
                <h5 class="text-center text-{{ session('checkout')['status'] }}">{{ session('checkout')['message'] }}</h5>
            @elseif (count($list) > 0 )
            <div class="row">
                <div class="col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- checkout start -->
                        <div class="tab-pane active" id="checkout">
                            <div class="checkout-content box-shadow p-30">
                                <form action="{{ route('front.cart.checkout.handle') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <!-- billing details -->
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                
                                                <input type="text" name="orderName" placeholder="Name" value="{{ $user ? $user->first_name . ' ' . $user->last_name : old('orderName') }}" required>
                                                @if ($errors->has('orderName'))
                                                <small class="text-danger">{{ $errors->first('orderName') }}</small>
                                                @endif
                                                
                                                <input type="text" name="orderEmail" placeholder="Email" required value="{{ $user ? $user->email : old('orderEmail') }}">
                                                @if ($errors->has('orderEmail'))
                                                <small class="text-danger">{{ $errors->first('orderEmail') }}</small>
                                                @endif
                                                
                                                <input type="text" name="orderPhone" placeholder="Phone" required value="{{ $user ? $user->phone : old('orderPhone') }}">
                                                @if ($errors->has('orderPhone'))
                                                <small class="text-danger">{{ $errors->first('orderPhone') }}</small>
                                                @endif

                                                <input type="text" name="orderAddress" placeholder="Address" required value="{{ $user ? $user->address : old('orderAddress') }}">
                                                @if ($errors->has('orderAddress'))
                                                <small class="text-danger">{{ $errors->first('orderAddress') }}</small>
                                                @endif
                                                
                                                <textarea name="orderNote" class="custom-textarea" placeholder="Notes (optional)" >{{ old('orderNote') }}</textarea>
                                                @if ($errors->has('orderNote'))
                                                <small class="text-danger">{{ $errors->first('orderNote') }}</small>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- our order -->
                                            <div class="payment-details mb-50">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    {{-- {{ dd($list) }} --}}
                                                    <tbody>
                                                        @foreach ($list as $item)
                                                        <tr>
                                                            <td class="td-title-1">{{ $item->name }} x {{ $item->qty }}</td>
                                                            <td class="td-title-2">${{ $item->price * $item->qty }}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="order-total">Order total</td>
                                                            <td class="order-total-price">$ {{ Cart::subtotal() }}</td>
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