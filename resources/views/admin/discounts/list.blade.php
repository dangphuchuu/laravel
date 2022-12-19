@extends('admin.layout.index')
@section('content')
@can('list discounts')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.discounts')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.discounts')</a> </li>
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
                            @can('add discounts')
                            <a href="admin/discounts/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3">@lang('lang.add')</button>
                            </a>
                            <button style="margin-bottom: 10px" data-url="{{ url('ajax/deleteall_discounts') }}" class="btn btn-danger delete_all">@lang('lang.delete_all')</button>
                            @endcan
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <th><input type="checkbox" id="master"></th>
                                            <th>@lang('lang.code')</th>
                                            <th>@lang('lang.discounts')</th>
                                            <th>@lang('lang.quanty')</th>
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th>
                                            @can('add discounts')
                                            <th>@lang('lang.active')</th>
                                            @endcan
                                            @can('edit discounts')
                                            <th>@lang('lang.edit')</th>
                                            @endcan
                                            @can('delete discounts')
                                            <th>@lang('lang.delete')</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($discounts as $value)
                                        <tr align="center">
                                            <td><input type="checkbox" class="sub_chk" data-id="{!! $value['id'] !!}"></td>
                                            <td>{!! $value['code'] !!}</td>
                                            <td>{!! $value['discounts'] !!}%</td>
                                            <td>{!! $value['quantity'] !!}</td>
                                            <td>{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</td>
                                            <td>{!! date("d-m-Y H:m:s", strtotime($value['updated_at'])) !!}</td>
                                            @can('add discounts')
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!}>
                                            </td>
                                            @endcan
                                            @can('edit discounts')
                                            <td class="center "><a class="btn btn-warning " href="admin/discounts/edit/{!! $value['id'] !!}">@lang('lang.edit')</a></td>
                                            @endcan
                                            @can('delete discounts')
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_discounts', $value['id'] ) }}" class="btn btn-danger delete-discounts">@lang('lang.delete')</a></td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $discounts->links() !!}
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
        var dis_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_discount',
            data: {
                'active': active,
                'dis_id': dis_id
            },
        });
    });

    //deleteall ajax 
    $(document).ready(function() {
        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                // alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });
    });

    //delete ajax 
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-discounts').on('click', function() {
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