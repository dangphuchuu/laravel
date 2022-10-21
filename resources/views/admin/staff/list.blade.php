@extends('admin.layout.index')
@section('content')
@role('admin')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.staff')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.staff')</a> </li>
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
                            <a href="admin/staff/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3">@lang('lang.add')</button>
                            </a>
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap ">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <!-- <th>FirstName</th>
                                            <th>LastName</th> -->
                                            <th>@lang('lang.staff')</th>
                                            <th>Email</th>
                                            <th>@lang('lang.role')</th>
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th>
                                            <th>@lang('lang.active')</th>
                                            <th>@lang('lang.edit') @lang('lang.role')</th>
                                            <th>@lang('lang.edit') @lang('lang.permission')</th>
                                            <th>@lang('lang.edit') @lang('lang.info')</th>
                                            <th>@lang('lang.delete')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $value)
                                        @foreach($value['roles'] as $role)
                                        @if($role['name'] == 'admin' || $role['name'] == 'staff' )
                                        <tr align="center">
                                            <td>{!! $value['id'] !!}</td>
                                            <!-- <td>{!! $value['firstname'] !!}</td>
                                            <td>{!! $value['lastname'] !!}</td> -->
                                            <td>{!! $value['username'] !!}</td>
                                            <td>{!! $value['email'] !!}</td>
                                            @foreach($value['roles'] as $role)
                                            <td>
                                                {!! $role['name'] !!}
                                            </td>
                                            @endforeach
                                            <td>{!! $value['created_at'] !!}</td>
                                            <td>{!! $value['updated_at'] !!}</td>
                                            @if($value->hasRole('admin'))
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" class="btn-check" data-onstyle="secondary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!} disabled>
                                            </td>
                                            @else
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!} >
                                            </td>
                                            @endif
                                            <td class="center "><a class="btn btn-primary " href="admin/staff/role/{!! $value['id'] !!}">@lang('lang.role')</a></td>
                                            <td class="center "><a class="btn btn-success " href="admin/staff/permission/{!! $value['id'] !!}">@lang('lang.permission')</a></td>
                                            <td class="center "><a class="btn btn-warning " href="admin/staff/edit/{!! $value['id'] !!}">@lang('lang.edit')</a></td>
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_staff', $value['id'] ) }}" class="btn btn-danger delete-staff">@lang('lang.delete')</a></td>
                                        </tr>
                                        @endif
                                        @endforeach
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
<h1 align="center">@lang('lang.deny')</h1>
@endrole
@section('script')
<script>
    //active
    $('.toggle-class').on('change', function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var staff_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_staff',
            data: {
                'active': active,
                'staff_id': staff_id
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
        $('.delete-staff').on('click', function() {
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