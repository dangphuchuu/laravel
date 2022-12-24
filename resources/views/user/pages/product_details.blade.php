@extends('user.layout.index')
@section('content')
@include('user.layout.menu_product')

<style>
    .rating {
        list-style-type: none;
    }

    .rating li {
        float: left;
        color: #EDBB0E;
    }

    .ral {
        display: inline-block;
        cursor: pointer;
    }
</style>
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="user_asset/images/products/{!! $products['image'] !!}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img src="user_asset/images/products/{!! $products['image']!!}" alt="">
                        @foreach($products['Imagelibrary'] as $value)
                        @if(isset($value['image_library']))
                        <img src="user_asset/images/products/{!! $value['image_library'] !!}" alt="">
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{!! $products['name'] !!}</h3>
                    <div class="product__details__rating">
                        @if(count($ratings)!=0)
                        <?php
                        $count = count($ratings);
                        $sum = 0;
                        foreach ($ratings as $rt) {
                            $sum += $rt['ratings'];
                        }
                        if ($count != 0) {
                            $avgStar_ratings = round($sum / $count, 2);
                        } else {
                            $avgStar_ratings = 0;
                        }
                        $star = 0;
                        while ($star < 5) {
                            if (($avgStar_ratings - $star) > 0.5) {
                        ?>
                                <i class="fa fa-star"></i>
                            <?php
                            } else if (($avgStar_ratings - $star) == 0.5) {
                            ?>
                                <i class="fa fa-star-half"></i>
                            <?php
                            } else if (($avgStar_ratings - $star) < 0.5) {
                            ?>
                                <i class="fa fa-star-o"></i>
                        <?php
                            }
                            $star++;
                        }
                        ?>
                        <span>({!! count($ratings) !!} @lang('lang.reviews'))</span>
                        @else

                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <span>(0 @lang('lang.reviews'))</span>

                        @endif
                    </div>
                    <div class="product__details__price">
                        @if(isset($products['price_new']))
                        @if(!isset($products['price']))
                        {!! number_format($products['price_new']) !!}₫
                        @else
                        <span style="text-decoration: line-through;color: rgb(187, 181, 172);font-size: 20px;">{!! number_format($products['price']) !!}₫</span>
                        {!! number_format($products['price_new']) !!}₫
                        @endif
                        @else
                        {!! number_format($products['price']) !!}₫
                        @endif
                    </div>
                    <form action="/cart" method="POST">
                        @csrf
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <!-- <div class="pro-qty"> -->
                                <input name="qty" type="number" min="1" value="1">
                                <input name="productid_hidden" type="hidden" value="{!! $products['id'] !!}">
                                <!-- </div> -->
                            </div>
                        </div>
                        @if(Auth::check())
                        <button type="submit" class="primary-btn">@lang('lang.add_to_cart')</button>
                        @else
                        <button type="submit" class="primary-btn">@lang('lang.please_login')</button>
                        @endif
                        @if(Auth::check())
                        <a href="javascript:void(0)" data-productid="{!! $products['id'] !!}" class="wishlist">
                            @if($countWishlist >0)
                            <i class="fas fa-heart "></i>
                            @else
                            <i class="far fa-heart "></i>
                            @endif
                        </a>
                        @else
                        <a href="/login" data-productid="{!! $products['id'] !!}" class=" wishlist">
                            <i class="far fa-heart "></i>
                        </a>
                        @endif
                    </form>
                    <ul>
                        <li><b>@lang('lang.brands')</b> <span>{!! $products['brands']['name'] !!}</span></li>
                        <li><b>@lang('lang.availability')</b>
                            @if($products['active'] == 1)
                            <span class="text-success">@lang('lang.in_stock')</span>
                            @else
                            <span class="text-danger">@lang('lang.out_stock')</span>
                            @endif
                        </li>
                        <li><b>@lang('lang.size')</b> <span>{!! $products['size'] !!}</span></li>
                        <li><b>@lang('lang.quanty')</b> <span>{!! $products['quantity'] !!}</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                        @if(Auth::check())
                        <button class="btndanhgia">@lang('lang.your_review')</button>
                        <div class="formdanhgia">
                            <form action="/addRating" method="POST">
                                @csrf
                                <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                <div class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                    <input type="radio" name="ratings" id="star1" value="5"><label for="star1"></label>
                                    <input type="radio" name="ratings" id="star2" value="4"><label for="star2"></label>
                                    <input type="radio" name="ratings" id="star3" value="3"><label for="star3"></label>
                                    <input type="radio" name="ratings" id="star4" value="2"><label for="star4"></label>
                                    <input type="radio" name="ratings" id="star5" value="1"><label for="star5"></label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control txtComment w-100" name="content" id="editor" placeholder="Đánh giá của bạn về sản phẩm này"></textarea>
                                </div>
                                <input type="hidden" name="products_id" value="{!! $products['id'] !!}">
                                <button type="submit" class="btn nutguibl">Gửi bình luận</button>
                            </form>
                        </div>
                        @else
                        <form action="/login">
                            <button class="btndanhgia">@lang('lang.please_login_before_rating')</button>
                        </form>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">@lang('lang.description')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">@lang('lang.reviews') <span>({!! count($ratings) !!})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @if(isset($products['content']))
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>@lang('lang.product_info')</h6>
                                <p>{!! $products['content'] !!}</p>
                                @if(isset($products['link']))
                                <p> <iframe style="height: 700px;" width="100%" src="https://www.youtube.com/embed/{!! $products['link'] !!} " title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                @if(count($ratings)>0)
                                @foreach($ratings as $value)
                                <h5 style="margin-bottom: 0px">{!! $value['users']['lastname'] !!} {!! $value['users']['firstname'] !!}</h5>
                                <ul class="ral rating">
                                    <?php
                                    $count = 0;
                                    while ($count < 5) {
                                        if (($value['ratings'] - $count) > 0.5) {
                                    ?>
                                            <li><i class="fa fa-star"></i></li>
                                        <?php
                                        } else if (($value['ratings'] - $count) == 0.5) {
                                        ?>
                                            <li><i class="fa fa-star-half"></i></li>
                                        <?php
                                        } else if (($value['ratings'] - $count) < 0.5) {
                                        ?>
                                            <li><i class="fa fa-star-o"></i></li>
                                    <?php
                                        }
                                        $count++;
                                    }
                                    ?>
                                </ul>
                                <p style="font-size: 12px;">{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</p>
                                <h6>{!! $value['content'] !!}</h6>
                                @endforeach
                                @else
                                <h3 style="margin-bottom: 0px;text-align: center;">@lang('lang.none_rating')</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>@lang('lang.related_product')</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($related_products as $related)
            @if($related['active'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="user_asset/images/products/{!! $related['image'] !!}">
                        <ul class="product__item__pic__hover">
                            @if(Auth::check())
                            @php
                            $countWishlist =$wishlist->countWishlist($related['id']);
                            @endphp
                            <li><a href="javascript:void(0)" data-productid="{!! $related['id'] !!}" class="related_wishlist">
                                    @if($countWishlist >0)
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                </a></li>
                            @else
                            <li><a href="/login" data-productid="{!! $related['id'] !!}" class="wishlist">
                                    <i class="far fa-heart"></i>
                                </a></li>
                            @endif
                            <li><a href="/products/{!! $related['id'] !!}"><i class="fa fa-retweet"></i></a></li>
                            <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{!! $related['name'] !!}</a></h6>
                        <h5>{!! number_format($related['price']) !!}</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
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
                        $('a[data-productid=' + products_id + ']').html('<i class="fas fa-heart "></i>');
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                    } else if (response.action == 'remove') {
                        totalWishlist();
                        $('a[data-productid=' + products_id + ']').html('<i class="far fa-heart "></i>');
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
<script>
    $(document).ready(function() {
        $('.related_wishlist').click(function() {
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
<script>
    var rating = document.querySelector('.btndanhgia');
    var form_rating = document.querySelector('.formdanhgia');
    rating.addEventListener('click', function() {
        form_rating.classList.toggle('active')
    })
</script>
@endsection