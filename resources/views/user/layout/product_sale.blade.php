<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
<style>
    .bi-arrow-up::before {
        content: "\f148";
        position: absolute;
        border-radius: 50%;
        background: #379f37;
        left: 0;
    }
</style>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <a href="/product_sale_all"><h2>Sale Off</h2></a>
                </div>

                <div class="featured__controls">

                </div>
            </div>
        </div>

        <div class="categories__slider owl-carousel">
            @foreach($products as $pro)
            @if(isset($pro['price']))
            @if(isset($pro['price_new']))
            <!-- <div class="col-lg-3">
                <div class="categories__item set-bg">
                <img src="user_asset/images/products/{!! $pro['image'] !!}" alt="">
                    <h5><a href="#">{!! $pro['name'] !!}</a></h5>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="user_asset/images/products/{!! $pro['image'] !!}" >
                        <div class="product__discount__item__pic set-bg">
                            <!-- <img src="user_asset/images/products/{!! $pro['image'] !!}" alt=""> -->
                            @if($pro['price'] > $pro['price_new'])
                            <div class="product__discount__percent">{!! number_format(100-(($pro['price_new']*100)/($pro['price'])),1)!!}%</div>
                            @else
                            <div class="product__discount__percent"><span class="bi bi-arrow-up"></span>{!! number_format((($pro['price'])/($pro['price_new'])*100),1)!!}%</div>
                            @endif
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
                                <li><a href="/products/{!! $pro['id'] !!}"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="featured__item__text">
                        @if(isset($pro['name']))
                        <h6><a href="/products/{!! $pro['id'] !!}">{!! $pro['name'] !!}</a></h6>
                        @endif
                        @if(isset($pro['price'])&& isset($pro['price_new']))
                        <div class="product__discount__item__text">
                            <div class="product__item__price" style="color:red">{!! number_format($pro['price_new']) !!} <span>{!! number_format($pro['price']) !!}</span></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
</section>
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