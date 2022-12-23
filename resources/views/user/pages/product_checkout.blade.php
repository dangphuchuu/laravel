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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="/cart">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="/order_place" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    <p>Last name<span>*</span></p>
                                        <input type="text" name="lastname" value="{!! $user['lastname']?$user['lastname']:'' !!}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First name<span>*</span></p>
                                        <input type="text" name="firstname" value="{!! $user['firstname']?$user['firstname']:'' !!}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" required>
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input type="text" name="district" required>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" name="city" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{!! $user['phone']?$user['phone']:'' !!}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{!! $user['email']?$user['email']:'' !!}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="content"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">                              
                                <h4>Your Order</h4>                             
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                @foreach($content as $value)   
                                <ul>
                                    <li>{!! $value->name !!} 
                                        <span>
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
                                        </span>
                                    </li>
                                </ul>
                                @endforeach  
                                <div class="checkout__order__subtotal">Subtotal <span>{!! Cart::pricetotal(0,',','.').' '.'đ' !!}</span></div>
                                <div class="checkout__order__total">Discount <span></span></div>
                                <div class="checkout__order__total">Total <span>{!! Cart::total(0,',','.').' '.'đ' !!}</span></div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="submit"class="site-btn">PLACE ORDER</button>                                                       
                            </div>                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    <!-- Js Plugins -->
</body>
@endsection
@section('script')
<script>
    totalWishlist();
    function totalWishlist()
    {
        $.ajax({
            type: 'GET',
            url: '/total_wishlist',
            success:function(response){
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