@extends('user.layout.index')
@section('content')
@include('user.layout.menu_product')
<?php
use Gloudemans\Shoppingcart\Facades\Cart;
$content = Cart::content();
?>
<body>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="user_asset/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th></th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $value)                             
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="user_asset/images/products/{!! $value->options->image !!}" width="200px" alt="">
                                        <h5>{!! $value->name !!}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                       @if($value->options->price_new)
                                        {!! number_format($value->options->price_new).' '.'đ' !!}
                                        @else
                                        {!! number_format($value->price).' '.'đ' !!}
                                       @endif
                                    </td>
                                    <form action="/update_cart" method="POST">
                                        @csrf
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="cart_quantity" value="{!! $value->qty !!}">
                                                
                                            </div>
                                        </div>
                                        <input type="hidden" value="{!! $value->rowId !!}" name="rowId_cart">
                                    </td>
                                    <td><input type="submit" value="Update" name="update_qty"></td>
                                    </form>
                                    <td class="shoping__cart__total">
                                    <?php 
                                        if($value->options->price_new)
                                        {
                                            $value->price = $value->options->price_new;
                                            $sum = $value->price * $value->qty;
                                        }
                                        else
                                        {
                                            $sum = $value->price * $value->qty;
                                        }
                                        echo number_format($sum).' '.'đ';
                                    ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                       <a href="/delete_cart/{!! $value->rowId !!}"> <span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span> {!! Cart::pricetotal(0,',','.').' '.'đ' !!}</span></li>
                            <li>Tax <span> {!! Cart::tax(0,',','.').' '.'đ' !!}</span></li>
                            <li>Total <span> {!! Cart::total(0,',','.').' '.'đ' !!}</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
@section('script')
<script>
    totalWishlist();

    function totalWishlist() {
        $.ajax({
            type: 'GET',
            url: '/total_wishlist',
            success: function(response) {
                var response = JSON.parse(response);
                $('.total_wishlist').text(response);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('.wishlist').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var users_id = "{!! Auth::id() !!}";
            var products_id = $(this).data('productid');
            $.ajax({
                type: 'POST',
                url: '/wishlist',
                data: {
                    products_id: products_id,
                    users_id: users_id
                },
                success: function(response) {
                    if (response.action == 'add') {
                        totalWishlist();
                        $('a[data-productid=' + products_id + ']').html('<i class="fas fa-heart"></i>');
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                    } else if (response.action == 'remove') {
                        totalWishlist();
                        $('a[data-productid=' + products_id + ']').html('<i class="far fa-heart"></i>');
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                    }
                }
            });
        });
    });
</script>
@endsection