@extends('admin.layout.index')
@section('content')
@can('list banners')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-aperture bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.ban')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.ban')</a> </li>
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
                    <div class="card" style="width:100%">

                        <div class="card-block">
                            @can('add banners')
                            <a href="admin/banners/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3">@lang('lang.add')</button>
                            </a>
                            <button style="margin-bottom: 10px" data-url="{{ url('ajax/deleteall_banners') }}" class="btn btn-danger delete_all">@lang('lang.delete_all')</button>
                            @endcan
                            <table style="width:100%" class="table table-striped table-bordered ">
                                <thead>
                                    <tr align="center">
                                        <th><input type="checkbox" id="master"></th>
                                        <th>@lang('lang.image')</th>
                                        <th>@lang('lang.active')</th>
                                        @can('edit banners')
                                        <th>@lang('lang.edit')</th>
                                        @endcan
                                        @can('delete banners')
                                        <th>@lang('lang.delete')</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $value )
                                    <tr align="center">
                                        <td><input type="checkbox" class="sub_chk" data-id="{!! $value['id'] !!}"></td>
                                        <td>
                                            <div style="white-space:pre-wrap;text-align:left;text-align: center"></div>
                                            <img width="100px" src="user_asset/images/banners/{!! $value['image'] !!}" alt="">
                                        </td>
                                        <td>
                                                <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{!! $value['id'] !!}" data-onstyle="primary" data-offstyle="danger" {!! $value['active']==true ? 'checked' : '' !!}>
                                        </td>
                                        @can('edit banners')
                                        <td class="center"><a class="btn btn-warning " href="admin/banners/edit/{!! $value['id'] !!}">@lang('lang.edit')</a></td>
                                        @endcan
                                        @can('delete banners')
                                        <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_banners', $value['id'] ) }}" class="btn btn-danger delete-banners">@lang('lang.delete')</a></td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {!!$banners->links()!!} --}}
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
        var ban_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'ajax/active_banners',
            data: {
                'active': active,
                'ban_id': ban_id
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
        $('.delete-banners').on('click', function() {
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