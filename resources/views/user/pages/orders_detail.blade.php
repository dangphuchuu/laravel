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
                        <h2>@lang('lang.order')</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">@lang('lang.home')</a>
                            <span>@lang('lang.order')</span>
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
                        <table class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>@lang('lang.products')</th>
                                    <th>@lang('lang.image')</th>
                                    <th>@lang('lang.quanty')</th>
                                    <th>@lang('lang.price')</th>
                                    <th>@lang('lang.created')</th>
                                    <th>@lang('lang.updated')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders_detail as $value)
                                <tr>
                                    <td>{!! $value['name'] !!}</td>
                                    <td><img style="width: 200px" src="user_asset/images/products/{!! $value['image'] !!}" alt=""></td>
                                    <td>{!! $value['quantity'] !!}</td>
                                    <td>{!! number_format($value['price']) !!} đ</td>
                                    <td>{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</td>
                                    <td>{!! date("d-m-Y H:m:s", strtotime($value['updated_at'])) !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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