<?php

use Gloudemans\Shoppingcart\Facades\Cart;

$content = Cart::content();
?>
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="upload/logos/{!! ($about!=null)?$about['logo']: '' !!}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        @if(Auth::check())
        <ul>
            <li><a href="/wishlist_pages"><i class="fa fa-heart"></i> <span class="total_wishlist"></span></a></li>
            <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span>{!! $content->count() !!}</span></a></li>
        </ul>   
        <div class="header__cart__price">item: <span>{!! Cart::total(0,',','.').' '.'đ' !!}</span></div>
        @endif
    </div>
    <div class="humberger__menu__widget">
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
                    <a class="dropdown-item" href="/profile">Profile</a>
                    <a class="dropdown-item" href="/your_orders">Your Orders</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
            @else
            <a href="/login"><i class="fa fa-user"></i> Login</a>
            @endrole
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/all_products">Shop</a></li>
            <li><a href="#">All Categories</a>
                <ul class="header__menu__dropdown dpd_categories">
                    @foreach($categories as $cat)
                    <li class="dpd_categories"><a href="/categories/{!! $cat['id'] !!}">{!! $cat['name'] !!}</a>
                        <ul class="header__menu__dropdown ">
                            @foreach($cat['Subcategories'] as $sub)
                            @if($sub['active'] == 1)
                            <li class="dpd_categories_item"><a href="/subcategories/{!! $sub['id'] !!}">{!! $sub['name'] !!}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="hero__search__phone__icon">
        <i class="fa fa-phone"></i>
    </div>
    <div class="hero__search__phone__text">
        <h5>{!! ($about!=null)?$about['phone']:'' !!}</h5>
        <span>{!! ($about!=null)?$about['worktime']:'' !!}</span>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i>{!! ($about!=null ? $about['email'] : '') !!}</li>
            <li>{!! ($about!=null ? $about['title'] : '') !!}</li>
        </ul>
    </div>
</div>