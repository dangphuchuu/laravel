@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.brands')</h4>
                    <span>@lang('lang.edit')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/admin/brands/list"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">@lang('lang.brands')</li>
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
                            <h5>@lang('lang.edit') @lang('lang.brands')</h5>

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

                            <form action="admin/brands/edit/{!! $brands['id'] !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.name')</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="{!! $brands['name'] !!}" class="form-control" name="name"
                                            placeholder="Nhập tên thương hiệu" required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.image')</label>
                                    <div class="col-sm-11">
                                    <img src="user_asset/images/brands/{!! $brands['image'] !!}" width="300px" alt="">
                                    <br>
                                        <input type="file" name="Image" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.active')</label>
                                    <div class="col-sm-11 mt-2">
                                        <label class="radio-inline">
                                            <input
                                            @if( $brands['active'] == 1 )
                                                {!! 'checked' !!}
                                            @endif
                                            name="active" value="1"  type="radio">@lang('lang.yes')
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                            @if( $brands['active'] == 0 )
                                                {!! 'checked' !!}
                                            @endif
                                            name="active" value="0"  type="radio">@lang('lang.no')
                                        </label>
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