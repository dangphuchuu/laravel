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
                    <h2>Sale Off</h2>
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
                    <div class="featured__item__pic set-bg">
                        <div class="product__discount__item__pic set-bg">
                            <img src="user_asset/images/products/{!! $pro['image'] !!}" alt="">
                            @if($pro['price'] > $pro['price_new'])
                            <div class="product__discount__percent">{!! number_format(100-(($pro['price_new']*100)/($pro['price'])),1)!!}%</div>
                            @else 
                            <div class="product__discount__percent"><span class="bi bi-arrow-up" ></span>{!! number_format((($pro['price'])/($pro['price_new'])*100),1)!!}%</div>
                            @endif
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="/products/{!! $pro['id'] !!}"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="featured__item__text">
                        @if(isset($pro['name']))
                        <h6><a href="/products/{!! $pro['id'] !!}">{!! $pro['name'] !!}</a></h6>
                        @endif
                        @if(isset($pro['price']))
                        @if(isset($pro['price_new']))
                        <div class="product__discount__item__text">
                            <div class="product__item__price" style="color:red">{!! number_format($pro['price_new']) !!} <span>{!! number_format($pro['price']) !!}</span></div>
                        </div>
                        @endif
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