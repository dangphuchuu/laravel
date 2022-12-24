@include('user.layout.product_sale')
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <a href="/product_featured_all">
                        <h2>@lang('lang.featured_product')</h2>
                    </a>
                </div>
                <div class="featured__controls">

                </div>
            </div>
        </div>
        <div class="categories__slider owl-carousel">
            @foreach($products as $pro)
            @if($pro['featured_product'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="user_asset/images/products/{!! $pro['image'] !!}">
                        <!-- <img src="user_asset/images/products/{!! $pro['image'] !!}" alt=""> -->
                        <ul class="featured__item__pic__hover">
                            @if(Auth::check())
                            @php
                            $countWishlist =$wishlist->countWishlist($pro['id']);
                            @endphp
                            
                            <li><a href="javascript:void(0)" data-productid="{!! $pro['id'] !!}" class="wishlist">
                                    @if($countWishlist >0)
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif

                                </a></li>
                            @else
                            <li><a href="/login" data-productid="{!! $pro['id'] !!}" class="wishlist">
                                    <i class="far fa-heart"></i>
                                </a></li>
                            @endif
                            <li><a href="/products/{!! $pro['id'] !!}"><i class="fa fa-retweet "></i></a></li>
                                <!-- <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li> -->
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        @if(isset($pro['name']))
                        <h6><a href="/products/{!! $pro['id'] !!}">{!! $pro['name'] !!}</a></h6>
                        @endif
                        @if(isset($pro['price']))
                        <h5>${!! number_format($pro['price']) !!}</h5>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
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
@include('user.layout.product_latest')