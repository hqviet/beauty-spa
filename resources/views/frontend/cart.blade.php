@extends('frontend.layout.app')
@section('title', 'Cart')
@section('content') 
<section id="page-content" class="page-wrapper">
    <div class=" plr-200 mb-80"></div> 
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="shopping-cart">
                            <div class="shopping-cart-content">
                                <div class="table-content table-responsive mb-50">
                                    @if (count($cart) > 0)
                                    <table class="text-center">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $item)
                                            <!-- tr -->
                                            <tr>
                                                <td class="product-thumbnail text-center">
                                                    <h6 class="product-title-2">
                                                        <a href="#">{{ $item->name }}</a>
                                                    </h6>
                                                </td>
                                                <td class="product-price">$ {{ $item->price }}</td>
                                                <td class="product-quantity ">
                                                    <div style="margin: 0 auto;">
                                                        <div class="cart-plus-minus" style="margin: 0 auto;">
                                                            <input type="text" disabled="disabled" data-rowid="{{ $item->rowId }}" value="{{ $item->qty }}" class="cart-plus-minus-box">
                                                        </div> 
                                                        <p class="text-danger" data-rowid="{{ $item->rowId }}" class="cart_qty"></p>
                                                    </div>
                                                </td>
                                                <td class="product-remove" >
                                                    <a class="remove-item" data-id="{{ $item->rowId }}" style="margin: 0 auto;" href="javascript:void(0);"><i class="zmdi zmdi-close"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="plus-minus-pro-action mt-20">
                                        <div class="sin-pro-action f-right">
                                            <a class="button small mb-20" id="submit_cart" href="{{ route('front.cart.checkout') }}"><span class="text-uppercase">Checkout</span></a>
                                        </div>
                                    </div>
                                    @else 
                                    <h5 class="text-center" style="color: #ff7f00">You have no items in your shopping cart!</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- shopping-cart end -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->             
</section>
@endsection
@section('scripts')
<script>
    $('.remove-item').click(function() {
        $.ajax({
            url: '{{ route('front.cart.remove') }}',
            type: 'post',
            data: {
                _token: '{{ Session::token() }}',
                id: $(this).data('id')
            },
            dataType: 'json'
        }).done(function(response) {
            location.reload();
        }).error(function() {
            alert('Something went wrong! Try again later!');
        });
    });
    
    $('.cart-plus-minus > .qtybutton').click(function() {
        var inputQty = $(this).parent().children('.cart-plus-minus-box');
        $.ajax({
            url: '{{ route('front.cart.update') }}',
            type: 'POST',
            data: {
                _token: '{{ Session::token() }}',
                rowId: inputQty.data('rowid'),
                qty: inputQty.val()
            } 
        }).done(function(data) {
            if (data.status == 'success') {
                $('.cart-plus-minus-box').empty().text(data.qty);
            }
            else if (data.status == 'fail') {
                notify('bottom', 'left', '&gt;', "danger", 'animated fadeInRight', 'animated fadeOutLeft', data.message);
            }
        }).fail(function() {
            location.reload();
        });
    });
</script>
@endsection