@extends('admin.layout.index')
@section('content')
@can('list orders')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Orders_Details</h4>
                    <a href="admin/orders/list"><span>Back to Orders</span></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Orders_Details</a> </li>
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
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">                                       
                                            <th>Product_name</th>
                                            <th>Product_image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders_detail as $value)
                                        <tr align="center">
                                           <td>{!! $value['name'] !!}</td>
                                           <td><img style="width: 300px" src="user_asset/images/products/{!! $value['image'] !!}" alt=""></td>
                                           <td>{!! $value['quantity'] !!}</td>
                                           <td>{!! number_format($value['price']).' '.'đ' !!}</td>                                                                                
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    @else
    <h1 align="center"> Không có quyền truy cập</h1>
    @endcan
    @endsection