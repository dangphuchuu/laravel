<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <a href="/product_latest_all"><h2>Latest Product</h2></a>
                </div>
                <div class="featured__controls">

                </div>
            </div>
        </div>
        <div class="categories__slider owl-carousel">
            @foreach($new_products as $new)
            @if(isset($new['image']))
            <!-- <div class="col-lg-3">
                <div class="categories__item set-bg">
                <img src="user_asset/images/products/{!! $pro['image'] !!}" alt="">
                    <h5><a href="#">{!! $pro['name'] !!}</a></h5>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="user_asset/images/products/{!! $new['image'] !!}">
                        <!-- <img src="user_asset/images/products/{!! $new['image'] !!}" alt=""> -->
                        <ul class="featured__item__pic__hover">
                            @if(Auth::check())
                            @php
                            $countWishlist =$wishlist->countWishlist($new['id']);
                            @endphp
                            <li><a href="javascript:void(0)" data-productid="{!! $new['id'] !!}" class="wishlist">
                                    @if($countWishlist >0)
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                </a></li>
                            @else
                            <li><a href="/login" data-productid="{!! $new['id'] !!}" class="wishlist">
                                    <i class="far fa-heart"></i>
                                </a></li>
                            @endif
                            <li><a href="/products/{!! $new['id'] !!}"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        @if(isset($new['name']))
                        <h6><a href="/products/{!! $new['id'] !!}">{!! $new['name'] !!}</a></h6>
                        @endif
                        @if(isset($new['price']))
                        <h5>${!! number_format($new['price']) !!}</h5>
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