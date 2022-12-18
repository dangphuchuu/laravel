@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.products')</h4>
                    <span>@lang('lang.add')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/admin/products/list"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">@lang('lang.products')</li>
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
                            <h5>@lang('lang.add') @lang('lang.products')</h5>

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

                            <form action="admin/products/create" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.cate')</label>
                                    <div class="col-sm-11">
                                        <select name="categories_id" class="form-control form-control-primary" id="category">
                                            @foreach ($categories as $value)
                                            @if($value['active'] == 1)
                                            <option value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.sub')</label>
                                    <div class="col-sm-11">
                                        <select name="sub_id" class="form-control form-control-primary" id="subcategory">
                                            @foreach ($subcategories as $value)
                                            @if($value['active'] == 1)
                                            <option value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.brands')</label>
                                    <div class="col-sm-11">
                                        <select name="brands_id"  class="form-control form-control-primary">
                                            @foreach ($brands as $value)
                                            @if($value['active'] == 1)
                                            <option value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.name')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" name="name" placeholder="@lang('lang.enter') @lang('lang.name')" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.image')</label>
                                    <div class="col-sm-11">
                                        <input type='file' name='Image' class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.image_library')</label>
                                    <div class="col-sm-11">
                                        <input type='file' name='Imagelibrary[]' class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Video</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" id="link" name="link" placeholder="https://www.youtube.com/watch?v=" value="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.size')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" name="size" placeholder="@lang('lang.enter') @lang('lang.size')" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.quanty')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" type="number" name="quantity" placeholder="@lang('lang.enter') @lang('lang.quanty')" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.price')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" type="number" name="price" placeholder="@lang('lang.enter') @lang('lang.price')" />
                                    </div>
                                </div>
                                <input type="checkbox" id="checkPrice" name="changeprice">
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.new_price')</label>
                                    <div class="col-sm-11">
                                        <input class="price_new form-control" type="number" name="price_new" disabled placeholder="@lang('lang.enter') @lang('lang.new_price')" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.content')</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control" name="content" id="editor" placeholder="@lang('lang.enter') @lang('lang.content')"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.featured_product')</label>
                                    <div class="col-sm-11 mt-2">
                                        <label class="radio-inline">
                                            <input name="featured_product" value="1"  checked type="radio">@lang('lang.yes')
                                        </label>
                                        <label class="radio-inline">
                                            <input name="featured_product" value="0"  type="radio">@lang('lang.no')
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.active')</label>
                                    <div class="col-sm-11 mt-2">
                                        <label class="radio-inline">
                                            <input name="active" value="1" checked type="radio">@lang('lang.yes')
                                        </label>
                                        <label class="radio-inline">
                                            <input name="active" value="0"  type="radio">@lang('lang.no')
                                        </label>
                                    </div>
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

@section('script')
<script>
     $(document).ready(function(){
        $("#category").change(function(){
            var cat_id = $(this).val();
            $.get("ajax/Subcategories/"+cat_id,function(data){
                $("#subcategory").html(data);
            });
        });
    });
</script>
<script>
        $(document).ready(function(){
            $('#checkPrice').change(function(){
            if($(this).is(":checked"))
            {
                $('.price_new').removeAttr('disabled');
            }
            else 
                {
                 $('.price_new').attr('disabled','');
                 }
            });
        });
    </script>
@endsection

