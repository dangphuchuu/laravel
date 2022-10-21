<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">@lang('lang.manage')</div>
            <ul class="pcoded-item pcoded-left-item">
                <!-- Categories -->
                @can('list category')
                <li class="pcoded">
                    <a href="admin/categories/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-align-justify"></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.cate')</span>
                    </a>
                </li>
                <li class="pcoded">
                    <a href="admin/subcategories/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-align-left "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.sub')</span>
                    </a>
                </li>
                @endcan
                <!-- Brands -->
                @can('list brands')
                <li class="pcoded">
                    <a href="admin/brands/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-award "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.brands')</span>
                    </a>
                </li>
                @endcan
                <!-- Products -->
                @can('list products')
                <li class="pcoded">
                    <a href="admin/products/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-package "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.products')</span>
                    </a>
                </li>
                @endcan
                <!-- Staff -->
                @role('admin')
                <li class="pcoded">
                    <a href="admin/staff/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-user "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.staff')</span>
                    </a>
                </li>
                @endrole
                <!-- User -->
                @can('list users')
                <li class="pcoded">
                    <a href="admin/user/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-user-plus "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.user')</span>
                    </a>
                </li>
                @endcan
                <!-- Discounts -->
                @can('list discounts')
                <li class="pcoded">
                    <a href="admin/discounts/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-codepen "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.dis')</span>
                    </a>
                </li>
                @endcan
                @role('admin')
                <!-- Roles -->
                <li class="pcoded">
                    <a href="admin/roles/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-credit-card "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.role')</span>
                    </a>
                </li>
                @endrole
                 <!-- Orders -->
                 @can('list orders')
                 <li class="pcoded">
                    <a href="admin/orders/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-credit-card "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.order')</span>
                    </a>
                </li>
                @endcan
                <!-- Banner -->
                @can('list banners')
                <li class="pcoded">
                    <a href="admin/banners/list" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-cpu "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.ban')</span>
                    </a>
                </li>
                @endcan
                <!-- About -->
                @role('admin')
                <li class="pcoded">
                    <a href="admin/about" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-info "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.about')</span>
                    </a>
                </li>
                @endrole
                <!-- Home page -->
                <li class="pcoded">
                    <a href="/" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-home "></i>
                        </span>
                        <span class="pcoded-mtext">@lang('lang.home')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>