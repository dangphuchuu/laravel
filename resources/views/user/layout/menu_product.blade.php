<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <ul>
                        @foreach($categories as $cat)
                        <li><a href="/categories/{!! $cat['id'] !!}">{!! $cat['name'] !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="/search" >
                        <a href="/all_products">
                            <div class="hero__search__categories">
                                -> All Products <-
                            </div>
                        </a>
                            <input type="search" name="search" value="{!! Request::get('search') !!}" placeholder="Search...">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{!! ($about!=null)?$about['phone']:'' !!}</h5>
                            <span>{!! ($about!=null)?$about['worktime']:'' !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>