<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>{!! ($about!=null)?$about['email'] : ''!!}</li>
                            <li>{!! ($about!=null)?$about['title'] : '' !!}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{!! $about['linkfanpage'] !!}"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="user_asset/images/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">VietNamese</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @hasrole('admin|user|staff')
                            <div class="dropdown show">
                                <a type="button" href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>Xin chào <span class="text-success">{!! Auth::user()->lastname !!} {!! Auth::user()->firstname !!}</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Your Orders</a>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </div>
                            @else
                            <a href="/login"><i class="fa fa-user"></i> Login</a>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./"><img src="upload/logos/{!! ($about!=null)?$about['logo']: '' !!}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class=""><a href="/">Home</a></li>
                        <li><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./cart">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @if(Auth::check())
                    <ul>               
                        <li><a href="/wishlist_pages">
                            <i class="fas fa-heart"></i> <span class="total_wishlist"></span>
                        </a></li>
                        <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>                     
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>