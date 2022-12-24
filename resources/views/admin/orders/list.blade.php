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
                                            <th>Update</th>
                                            @can('edit orders')
                                            <th>Details</th>                                          
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
                                           <form action="admin/orders/update/{!! $value['id'] !!}" method="POST">
                                            @csrf
                                           <td>
                                                <div class="form-group">
                                                <select name="status" style="text-align: center;">                                          
                                                <option @if($value['status'] == 1)  {!! 'selected' !!} @endif {!! $value['status'] !!}  value="1" class="text-warning">Processing</option>                                                          
                                                <option @if($value['status'] == 2)  {!! 'selected' !!} @endif {!! $value['status'] !!}  value="2" class="text-primary">Delivery</option>
                                                <option @if($value['status'] == 3)  {!! 'selected' !!} @endif {!! $value['status'] !!}  value="3" class="text-success">Success</option>
                                                <option @if($value['status'] == 4)  {!! 'selected' !!} @endif {!! $value['status'] !!}  value="4" class="text-danger">Denied</option>
                                                </select>
                                                </div>
                                           </td>
                                           <td><button type="submit" class="btn btn-success">Update</button></td>
                                           </form>
                                            @can('edit orders')
                                            <td class="center "><a class="btn btn-primary " href="admin/orders/details/{!! $value['id'] !!}">Details</a></td>
                                            @endcan
                                            @can('delete orders')
                                            <td class="center "><a href="javascript:void(0)" class="btn btn-danger delete-orders" data-url="{{ url('ajax/delete_orders', $value['id'] ) }}" >Delete</a></td>
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
    @section('script') 
    <script>
            $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-orders').on('click', function() {
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