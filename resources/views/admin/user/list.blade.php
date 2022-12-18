@extends('admin.layout.index')
@section('content')
@can('list users')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.user')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.user')</a> </li>
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
                                            <th>ID</th>
                                            <th>@lang('lang.fristname')</th>
                                            <th>@lang('lang.lastname')</th>
                                            <th>@lang('lang.username')</th>
                                            <th>Email</th>
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th>
                                            @can('delete users')
                                            <th>@lang('lang.active')</th>
                                            <th>@lang('lang.delete')</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $value)
                                        @foreach($value['roles'] as $role)
                                        @if($role['name'] == 'user')
                                        <tr align="center">
                                            <td>{!! $value['id'] !!}</td>
                                            <td>{!! $value['firstname'] !!}</td>
                                            <td>{!! $value['lastname'] !!}</td>
                                            <td>{!! $value['username'] !!}</td>
                                            <td>{!! $value['email'] !!}</td>
                                            <td>{!! $value['created_at'] !!}</td>
                                            <td>{!! $value['updated_at'] !!}</td>
                                            @can('delete users')
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!}>
                                            </td>
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_staff', $value['id'] ) }}" class="btn btn-danger delete-staff">@lang('lang.delete')</a></td>
                                            @endcan
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
@endcan
@section('script')
<script>
    $('.toggle-class').on('change', function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_user',
            data: {
                'active': active,
                'user_id': user_id
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