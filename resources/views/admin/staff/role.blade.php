@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.staff')</h4>
                    <span>@lang('lang.role')</span>
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
                            <h5>@lang('lang.edit') @lang('lang.role') :{!! $user['username'] !!}</h5>

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

                            <form action="admin/staff/role/{!! $user['id'] !!}" method="POST">
                                @csrf
                                @if(isset($all_role))
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.role')</label>
                                    <div class="col-sm-11">
                                        <select name="role" id="">
                                        @foreach($role as $value)
                                           <option 
                                           @if ($value['id'] == $all_role['id']) 
                                           {!! 'selected' !!}
                                           @endif 
                                           value="{!!$value['id']!!}">{!!$value['name']!!}
                                           </option>
                                           @endforeach
                                    </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <!-- @else 
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.role')</label>
                                    <div class="col-sm-11">
                                        <select name="role" id="">
                                        @foreach($role as $value)
                                           <option 
                                           value="{!!$value['id']!!}">{!!$value['name']!!}
                                           </option>
                                           @endforeach
                                    </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                @endif -->
                                <!-- @foreach($permission as $permis)
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{!! $permis['name'] !!}" id="{!! $permis['id'] !!}">
                                <label class="form-check-label" for="{!! $permis['id'] !!}">
                                    {!! $permis['name'] !!}
                                </label>
                                </div>
                                @endforeach -->
                                <div class="form-group ">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">@lang('lang.update') @lang('lang.role')</button>
                                        <button class="btn btn-primary m-b-0 btn-danger " href="{{ URL::previous() }}">@lang('lang.exit')</button>
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
