@extends('admin.layout.index')
@section('content')
@can('list orders')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Orders</h4>
                    <span>list</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Orders</a> </li>
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
                                            <th>ID_Orders</th>                                          
                                            <th>Customers</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>District</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                            <th>Updated_at</th>
                                            @can('edit orders')
                                            <th>Details</th>                                          
                                            <th>Edit</th>
                                            @endcan
                                            @can('delete orders')
                                            <th>Delete</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $value)
                                        <tr align="center">
                                           <td>{!! $value['id'] !!}</td>
                                           <td>{!! $value['users']['lastname'] !!} {!! $value['users']['firstname'] !!}</td>
                                           <td>{!! $value['users']['email'] !!}</td>
                                           <td>{!! $value['phone'] !!}</td>
                                           <td>{!! $value['address'] !!}</td>
                                           <td>{!! $value['district'] !!}</td>            
                                           <td>{!! $value['total']!!} đ</td>    
                                           <td>{!! $value['created_at'] !!}</td>
                                           <td>{!! $value['updated_at'] !!}</td>                                       
                                            @if($value['status'] == 1)
                                            <td class="text-warning">
                                            Đang xử lý
                                           </td>
                                           @elseif($value['status'] == 2)
                                           <td class="text-primary">
                                           Đang giao hàng
                                           </td>
                                           @elseif($value['status'] == 3)
                                           <td class="text-success">
                                           Thành công
                                           </td>
                                           @elseif($value['status'] == 4)
                                           <td class="text-danger">
                                           Đơn hàng đã bị hủy
                                           </td>
                                           @endif                                  
                                            @can('edit orders')
                                            <td class="center "><a class="btn btn-primary " href="admin/orders/details/{!! $value['id'] !!}">Details</a></td>
                                            <td class="center "><a class="btn btn-warning " href="admin/roles/edit/">Edit</a></td>
                                            @endcan
                                            @can('delete orders')
                                            <td class="center "><a class="btn btn-danger " href="admin/roles/delete/">Delete</a></td>
                                            @endcan
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