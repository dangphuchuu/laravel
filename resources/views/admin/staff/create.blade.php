@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.staff')</h4>
                    <span>@lang('lang.add')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/admin/staff/list"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">@lang('lang.staff')</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-body">
    <div class="page-wrapper">

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>@lang('lang.add') @lang('lang.staff')</h5>

                        </div>
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                {{ $arr }}<br>
                                @endforeach

                            </div>
                            @endif
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                            @endif

                            <form action="admin/staff/create" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>@lang('lang.fristname')</label>
                                    <input class="form-control" name="firstname" placeholder="@lang('lang.enter') @lang('lang.fristname')" />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.lastname')</label>
                                    <input class="form-control" name="lastname" placeholder="@lang('lang.enter') @lang('lang.lastname')" />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.username')</label>
                                    <input class="form-control" type="text" name="username" placeholder="@lang('lang.enter') @lang('lang.username')" />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="@lang('lang.enter') Email" />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.social_network')</label>
                                    <input class="form-control" type="text" name="facebook" placeholder="@lang('lang.enter') @lang('lang.social_network')" />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.phone')</label>
                                    <input class="form-control" type="phone" name="phone" placeholder="@lang('lang.enter') @lang('lang.phone')" />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.active')</label>
                                    <div class="col-sm-11">
                                        <select name="active" id="">
                                            <option value="1">@lang('lang.yes')</option>
                                            <option value="0">@lang('lang.no')</option>
                                        </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.password')</label>
                                    <input type="password" class="form-control" name="password" placeholder="@lang('lang.enter') @lang('lang.password')" />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.password_again')</label>
                                    <input type="password" class="form-control" name="passwordagain" placeholder="@lang('lang.password_again')" />
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">@lang('lang.add')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection