@extends('user.layout.index')
@section('content')
@include('user.layout.menu_product')
<!-- Breadcrumb Section Begin -->
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>@lang('lang.all') @lang('lang.cate')</h4>
                        <ul>
                            @foreach($categories as $cat)
                            <li><a href="/categories/{!! $cat['id'] !!}">{!! $cat['name'] !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    @foreach($pro_wish as $pro)
                    @if(Auth::user()->id == $pro['users']['id'] )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="user_asset/images/products/{!! $pro['products']['image'] !!}">
                                <ul class="product__item__pic__hover">
                                    @if(Auth::check())
                                    @php
                                    $countWishlist =$wishlist->countWishlist($pro['products']['id']);
                                    @endphp
                                    <li><a href="javascript:void(0)" data-productid="{!! $pro['products']['id'] !!}" class="wishlist">
                                            @if($countWishlist >0)
                                            <i class="fas fa-heart"></i>
                                            @else
                                            <i class="far fa-heart"></i>
                                            @endif
                                        </a></li>
                                    @endif
                                    <li><a href="/products/{!! $pro['products']['id'] !!}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{!! $pro['products']['name'] !!}</a></h6>
                                @if(isset($pro['products']['price']))
                                <h5>{!! number_format($pro['products']['price']) !!}</h5>
                                @else
                                <h5>{!! number_format($pro['products']['price_new']) !!}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div> -->
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</section>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#sort').on('change', function() {
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });
    });
</script>
@endsection