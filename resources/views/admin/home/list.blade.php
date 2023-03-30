@extends('admin.layout.index')
@section('content')
<style>
    .rating {
        margin-left: -32px;
        color: #EDBB0E;
    }
</style>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-red">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">@lang('lang.num_user')</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{!! $user->count() !!}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                    </div>
                </div>
                @foreach($user_new as $value)
                <p class="m-b-0 text-white">From {!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">@lang('lang.total_order')</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{!! $orders_detail->count() !!}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-database text-c-blue f-18"></i>
                    </div>
                </div>
                @foreach($orders_detail_new as $value)
                <p class="m-b-0 text-white">From {!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">@lang('lang.total_price')</h6>
                        <h3 class="m-b-0 f-w-700 text-white">
                            {!! number_format($sum) !!}
                        </h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign text-c-green f-18"></i>
                    </div>
                </div>
                @foreach($orders_new as $value)
                <p class="m-b-0 text-white">From {!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-yellow">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">@lang('lang.pro_rating')</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{!! $rating->count() !!}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags text-c-yellow f-18"></i>
                    </div>
                </div>
                <p class="m-b-0 text-white">From Previous Month</p>
            </div>
        </div>
    </div>


    <div class="col-xl-6 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>@lang('lang.what_new')</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-refresh-cw reload-card"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="latest-update-box">
                    @foreach($rating as $value)
                    <div class="row p-b-30">
                        <div class="col-auto text-right update-meta p-r-0">
                            <i class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                        </div>
                        <div class="col p-l-5">
                            <h6>{!! $value['users']['lastname'] !!} {!! $value['users']['firstname'] !!}</h6>
                            <p class="text-muted m-b-0">
                            <ul class=" ral rating">
                                <?php
                                $count = 0;
                                while ($count < 5) {
                                    if (($value['ratings'] - $count) > 0.5) {
                                ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    } else if (($value['ratings'] - $count) == 0.5) {
                                    ?>
                                        <i class="fa fa-star-half"></i>
                                    <?php
                                    } else if (($value['ratings'] - $count) < 0.5) {
                                    ?>
                                        <i class="fa fa-star-o"></i>
                                <?php
                                    }
                                    $count++;
                                }
                                ?>
                            </ul>
                            </p>
                            <p class="text-white m-b-0">@lang('lang.products'): {!! $value['products']['name'] !!}</p>
                            <p class="text-white m-b-0">{!! $value['content'] !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="card new-cust-card">
            <div class="card-header">
                <h5>@lang('lang.new_cus')</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-refresh-cw reload-card"></i></li>
                        <li><i class="feather icon-trash close-card"></i></li>
                        <li><i class="feather icon-chevron-left open-card-option"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                @foreach($user as $value)
                <div class="align-middle m-b-35">
                    <img src="upload/avatar/{!! $value['image'] !!}" alt="user image" class="img-radius img-40 align-top m-r-15">
                    <div class="d-inline-block">
                        <h6>{!! $value['lastname'] !!} {!! $value['firstname'] !!}</h6>
                        <p class="text-muted m-b-0">{!! $value['email'] !!}!</p>
                        <span class="status deactive text-mute"><i class="far fa-clock m-r-10"></i>{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection