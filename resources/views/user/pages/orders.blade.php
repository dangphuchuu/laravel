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
                                    <th>@lang('lang.id') @lang('lang.order')</th>
                                    <th>@lang('lang.customer')</th>
                                    <th>@lang('lang.phone')</th>
                                    <th>@lang('lang.address')</th>
                                    <th>@lang('lang.district')</th>
                                    <th>@lang('lang.city')</th>
                                    <th>@lang('lang.content')</th>
                                    <th>@lang('lang.total_price')</th>
                                    <th>@lang('lang.active')</th>
                                    <th>@lang('lang.order_detail')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $value)
                                @if(Auth::user()->id == $value['users_id'])
                                <tr>
                                    <td>{!! $value['id'] !!}</td>
                                    <td>{!! $value['lastname'] !!} {!! $value['firstname'] !!}</td>
                                    <td>{!! $value['phone'] !!}</td>
                                    <td>{!! $value['address'] !!}</td>
                                    <td>{!! $value['district'] !!}</td>
                                    <td>{!! $value['city'] !!}</td>
                                    <td>{!! $value['content'] !!}</td>
                                    <td>{!! $value['total'] !!} đ</td>
                                    @if($value['status'] == 1)
                                    <td class="text-warning">@lang('lang.processing')</td>
                                    @elseif($value['status'] == 2)
                                    <td class="text-primary">@lang('lang.delivery')</td>
                                    @elseif($value['status'] == 3)
                                    <td class="text-success">@lang('lang.success')</td>
                                    @elseif($value['status'] == 4)
                                    <td class="text-danger">@lang('lang.denied')</td>
                                    @endif
                                    <td><a href="/your_orders_detail/{!! $value['id'] !!}" class="btn btn-info">@lang('lang.detail')</a></td>
                                </tr>
                                @endif
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