@extends('admin.layout.index')
@section('content')
@can('list products')

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.products')</h4>
                    <span>@lang('lang.list')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.products')</a> </li>
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

                        <div class="card-block">
                            @can('add products')
                            <a href="admin/products/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3">@lang('lang.add')</button>
                            </a>
                            @endcan
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <!-- <th>ID</th> -->
                                            <th>@lang('lang.cate')</th>
                                            <th>@lang('lang.sub')</th>
                                            <th>@lang('lang.brands')</th>
                                            <th>@lang('lang.image')</th>
                                            <!-- <th>videos</th> -->
                                            <th>@lang('lang.name')</th>
                                            <th>@lang('lang.size')</th>
                                            <th>@lang('lang.quanty')</th>
                                            <th>@lang('lang.price')</th>
                                            <th>@lang('lang.new_price')</th>
                                            <!-- <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th> -->
                                            <th>@lang('lang.staff')</th>
                                            @can('add products')
                                            <th>@lang('lang.featured_product')</th>
                                            <th>@lang('lang.active')</th>
                                            @endcan
                                            @can('edit products')
                                            <th>@lang('lang.edit')</th>
                                            @endcan
                                            @can('delete products')
                                            <th>@lang('lang.delete')</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $value)
                                        <tr align="center">
                                            <!-- <td>{!! $value['id'] !!}</td> -->
                                            <td>{!! $value['categories']['name'] !!}</td>
                                            <td>{!! $value['subcategories']['name'] !!}</td>
                                            <td>{!! $value['brands']['name'] !!}</td>
                                            <td><img style="width: 300px" src="user_asset/images/products/{!! $value['image'] !!}" alt=""></td>
                                            <!-- <td>
                                                <iframe style="height: 300px;" width="400px" src="@if(isset($value['link'])) 
                                            https://www.youtube.com/embed/{!! $value['link'] !!} 
                                            @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </td> -->
                                            <td>{!! $value['name'] !!}</td>
                                            <td>{!! $value['size'] !!}</td>
                                            <td>{!! $value['quantity'] !!}</td>
                                            <td>{!! number_format($value['price']) !!}</td>
                                            <td>{!! number_format($value['price_new']) !!}</td>
                                            <!-- <td>{!! $value['created_at'] !!}</td>
                                            <td>{!! $value['updated_at'] !!}</td> -->
                                            <td>{!! $value['users']['firstname'] !!}</td>
                                            @can('add products')
                                            <td>
                                                <input type="checkbox" class="featured_product" data-style="ios" data-toggle="toggle" data-on="on" data-off="off" data-id="{!! $value['id'] !!}" data-onstyle="success" data-offstyle="danger" {!! $value['featured_product']==true ? 'checked' : '' !!}>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!}>
                                            </td>
                                            @endcan
                                            @can('edit products')
                                            <td class="center "><a class="btn btn-warning " href="admin/products/edit/{!! $value['id'] !!}">@lang('lang.edit')</a></td>
                                            @endcan
                                            @can('delete products')
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_products', $value['id'] ) }}" class="btn btn-danger delete-products"> @lang('lang.delete')</a></td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@else
<h1 align="center">@lang('lang.deny')</h1>
@endcan

@section('script')
<script>
    //active
    $('.toggle-class').on('change', function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var product_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_product',
            data: {
                'active': active,
                'product_id': product_id
            },
        });
    });
     //active featured_product
     $('.featured_product').on('change', function() {
        var featured_product = $(this).prop('checked') == true ? 1 : 0;
        var featured_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_featured_product',
            data: {
                'featured_product': featured_product,
                'featured_id': featured_id
            },
        });
    });

    //delete ajax 
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-products').on('click', function() {
            var userURL = $(this).data('url');
            var trObj = $(this);
            if (confirm("Are you sure you want to remove it?") == true) {
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data['success']) {
                            // alert(data.success);
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
@endsection