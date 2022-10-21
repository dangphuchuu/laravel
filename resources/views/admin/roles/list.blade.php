@extends('admin.layout.index')
@section('content')
@role('admin')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.role')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.role')</a> </li>
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
                            <!-- <a href="admin/roles/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3" >Add</button>
                            </a> -->
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>@lang('lang.name') @lang('lang.role')</th>
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th>
                                            <!-- <th>Edit</th>
                                            <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as  $value)
                                        <tr align="center">
                                            <td>{!! $value['id'] !!}</td>
                                            <td>{!! $value['name'] !!}</td>
                                            <td>{!! $value['created_at'] !!}</td>
                                            <td>{!! $value['updated_at'] !!}</td>
                                            <!-- <td class="center "><a class="btn btn-warning " href="admin/roles/edit/{!! $value['id'] !!}">Edit</a></td>
                                            <td class="center "><a class="btn btn-danger " href="admin/roles/delete/{!! $value['id'] !!}"> Delete</a></td> -->
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
    <h1 align="center">Không có quyền truy cập</h1>
    @endrole
    @endsection