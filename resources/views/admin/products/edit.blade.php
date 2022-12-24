@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.products')</h4>
                    <span>@lang('lang.edit')</span>
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
                            <h5>@lang('lang.edit') @lang('lang.products')</h5>

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

                            <form action="admin/products/edit/{!! $products['id'] !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.cate')</label>
                                    <div class="col-sm-11">
                                        <select name="categories_id" class="form-control form-control-primary" id="category">
                                            @foreach ($categories as $value)
                                            <option 
                                            @if ($products['categories']['id'] == $value['id'])
                                                {!! 'selected' !!}
                                            @endif
                                            value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.sub')</label>
                                    <div class="col-sm-11">
                                        <select name="sub_id" class="form-control form-control-primary" id="subcategory">
                                            @foreach ($subcategories as $value)
                                            <option 
                                            @if ($products['subcategories']['id'] == $value['id'])
                                                {!! 'selected' !!}
                                            @endif
                                            value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.brands')</label>
                                    <div class="col-sm-11">
                                        <select name="brands_id" class="form-control form-control-primary">
                                            @foreach ($brands as $value)
                                            <option 
                                            @if ($products['brands']['id'] == $value['id'])
                                                {!! 'selected' !!}
                                            @endif
                                            value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.name')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" name="name" placeholder="@lang('lang.enter') @lang('lang.name')" value="{!! $products['name'] !!}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.image')</label>
                                    <div class="col-sm-11">
                                    <img src="user_asset/images/products/{!! $products['image'] !!}" width="300px" alt="">
                                    <br>
                                        <input type='file' name='Image' class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.image_library')</label>
                                    <div class="col-sm-11">
                                        <input type='file' name='imagelibrary[]' class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @foreach($products->Imagelibrary as $value)
                                    <a href="javascript:void(0)" data-url="{{ url('ajax/deleteimages', $value['id'] ) }}" class="btn text-danger delete-image">X</a>        
                                    <img src="user_asset/images/products/{!! $value['image_library'] !!}" style="width: 20%;height: 20%; max-width:20%"  alt="">
                                    @endforeach
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.size')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" name="size" placeholder="@lang('lang.enter') @lang('lang.size')" value="{!! $products['size'] !!}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.quanty')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" type="number" name="quantity" placeholder="@lang('lang.enter') @lang('lang.quanty')" value="{!! $products['quantity'] !!}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Video</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" name="link" placeholder="https://www.youtube.com/watch?v=" value="{!! $products['link'] !!}"/>
                                            <iframe style="height: 300px;" width="400px" src="@if(isset($products['link'])) 
                                            https://www.youtube.com/embed/{!! $products['link'] !!} 
                                            @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.price')</label>
                                    <div class="col-sm-11">
                                        <input class="form-control" type="number" name="price" placeholder="@lang('lang.enter') @lang('lang.price')" value="{!! $products['price'] !!}" />
                                    </div>
                                </div>
                                <input type="checkbox" id="checkPrice" name="changeprice">
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.new_price')</label>
                                    <div class="col-sm-11">
                                        <input class="price_new form-control" type="number" name="price_new" disabled placeholder="@lang('lang.enter') @lang('lang.new_price')" value="{!! $products['price_new'] !!}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.content')</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control" name="content" id="editor" placeholder="@lang('lang.enter') @lang('lang.content')"  >{!! $products['content'] !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">@lang('lang.update')</button>
                                    </div>
                                </div>
                            </form>
                            <!-- @if(count ($products->Imagelibrary) > 0)
                                <div class="form-group row ">
                                    <div class="col-sm-4">
                                        @foreach($products->Imagelibrary as $value)
                                        <form action="admin/products/deleteimages/{!! $value['id'] !!}">
                                        <form action="">
                                        <a href="javascript:void(0)" data-url="{{ url('ajax/deleteimages', $value['id'] ) }}" class="btn text-danger delete-image">X</a>
                                        </form>
                                    <img src="user_asset/images/products/{!! $value['image_library'] !!}" width="300px" alt="">
                                    @endforeach
                                    </div>
                                </div>
                            @endif -->
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
<script>
    //active
     $(document).ready(function(){
        $("#category").change(function(){
            var cat_id = $(this).val();
            $.get("ajax/Subcategories/"+cat_id,function(data){
                $("#subcategory").html(data);
            });
        });
    });
     //delete ajax 
     $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-image').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Are you sure you want to remove it?") == true) {
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data['success']) {
                            alert(data.success);
                            trObj.parents("tr").remove();
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    }
                });
            }

        });
    });
</script>
@endsection