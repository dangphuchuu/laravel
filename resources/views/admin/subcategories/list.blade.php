@extends('admin.layout.index')
@section('content')
@can('list category')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.sub')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.sub')</a> </li>
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
                            @can('add category')
                            <a href="admin/subcategories/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3">@lang('lang.add')</button>
                            </a>
                            <button style="margin-bottom: 10px" data-url="{{ url('ajax/deleteall_subcategories') }}" class="btn btn-danger delete_all">@lang('lang.delete_all')</button>
                            @endcan
                            <div class="dt-responsive table-responsive">
                                <table id="autofill" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <th><input type="checkbox" id="master"></th>
                                            <th>@lang('lang.name') @lang('lang.cate')</th>
                                            <th>@lang('lang.sub')</th>
                                            <th>@lang('lang.sort_name')</th>
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.updated')</th>
                                            @can('add category')
                                            <th>@lang('lang.active')</th>
                                            @endcan
                                            @can('edit category')
                                            <th>@lang('lang.edit')</th>
                                            @endcan
                                            @can('delete category')
                                            <th>@lang('lang.delete')</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subcategories as $value)
                                        <tr align="center">
                                            <td><input type="checkbox" class="sub_chk" data-id="{!! $value['id'] !!}"></td>
                                            <td>{!! $value['categories']['name']!!}</td>
                                            <td>{!! $value['name'] !!}</td>
                                            <td>{!! $value['sort_name'] !!}</td>
                                            <td>{!! $value['created_at'] !!}</td>
                                            <td>{!! $value['updated_at'] !!}</td>
                                            @can('add category')
                                            <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!}>
                                            </td>
                                            @endcan
                                            @can('edit category')
                                            <td class="center "><a class="btn btn-warning " href="admin/subcategories/edit/{!! $value['id'] !!}">@lang('lang.edit')</a></td>
                                            @endcan
                                            @can('delete category')
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_subcategories', $value['id'] ) }}" class="btn btn-danger delete-subcategories"> @lang('lang.delete')</a></td>
                                            @endcan
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $subcategories->links() !!}
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
    //ajax active
    $('.toggle-class').on('change', function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var sub_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_sub',
            data: {
                'active': active,
                'sub_id': sub_id
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
        $('.delete-subcategories').on('click', function() {
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