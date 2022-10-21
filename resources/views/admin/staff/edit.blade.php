@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.staff')</h4>
                    <span>@lang('lang.edit')</span>
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
                            <h5>@lang('lang.edit') @lang('lang.staff') : {!! $user['username'] !!}</h5>

                        </div>
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                {{ $arr }}<br>
                                @endforeach

                            </div>
                            @endif

                            <form action="admin/staff/edit/{!! $user['id'] !!}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.fristname')</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="{!! $user['firstname'] !!}" class="form-control" name="firstname"
                                            placeholder="" >
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.lastname')</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="{!! $user['lastname'] !!}" class="form-control" name="lastname"
                                            placeholder="" >
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.username')</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="{!! $user['username'] !!}" class="form-control" name="username"
                                            placeholder="" >
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="{!! $user['email'] !!}" class="form-control" name="email"
                                            placeholder="" >
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.social_network')</label>
                                    <div class="col-sm-11">
                                    <input class="form-control" type="text" value="{!! $user['facebook'] !!}" name="facebook" placeholder="Enter Social Network" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.phone')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" type="phone" value="{!! $user['phone'] !!}" name="phone" placeholder="Enter Phone Number" />
                                    </div>
                                </div>
                                <input type="checkbox" id="checkChangpassword" name="changepassword">
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.password')</label>
                                    <div class="col-sm-11">
                                    <input type="password" class="password form-control" name="password" disabled placeholder="Enter Password" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.password_again')</label>
                                    <div class="col-sm-11">
                                    <input type="password" class="password form-control" name="passwordagain" disabled placeholder="Enter RePassword" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">@lang('lang.update')</button>
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
@section('script')
    <script>
        $(document).ready(function(){
            $('#checkChangpassword').change(function(){
            if($(this).is(":checked"))
            {
                $('.password').removeAttr('disabled');
            }
            else 
                {
                 $('.password').attr('disabled','');
                 }
            });
        });
    </script>
@endsection