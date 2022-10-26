<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Latest Product</h2>
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
                    <div class="featured__item__pic set-bg">
                        <img src="user_asset/images/products/{!! $new['image'] !!}" alt="">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
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