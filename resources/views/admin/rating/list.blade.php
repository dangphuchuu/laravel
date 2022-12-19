@extends('admin.layout.index')
@section('content')
@role('admin')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.rating')</h4>
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
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.rating')</a> </li>
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
                                <table id="autofill" class="table table-striped table-bordered nowrap ">
                                    <thead>
                                        <tr align="center">
                                            <th>ID_user</th>
                                            <th>@lang('lang.name')</th>
                                            <th>Email</th>
                                            <th>@lang('lang.products')</th>
                                            <th>@lang('lang.rating')</th>
                                            <!-- <th>@lang('lang.content')</th> -->
                                            <th>@lang('lang.created')</th>
                                            <th>@lang('lang.delete')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rating as $value)
                                        <tr align="center">
                                            <td>{!! $value['users']['id'] !!}</td>
                                            <td>{!! $value['users']['lastname'] !!} {!! $value['users']['firstname'] !!}</td>
                                            <td>{!! $value['users']['email'] !!}</td>
                                            <td>{!! $value['products']['name'] !!}</td>
                                            <td>{!! $value['ratings'] !!}</td>
                                            <!-- <td><p>{!! $value['content'] !!}</p></td> -->
                                            <td>{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</td>
                                            <td class="center "><a href="javascript:void(0)" data-url="{{ url('ajax/delete_rating', $value['id'] ) }}" class="btn btn-danger delete-rating">@lang('lang.delete')</a></td>
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
<h1 align="center">@lang('lang.deny')</h1>
@endrole
@section('script')
<script>
    //delete ajax 
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete-rating').on('click', function() {
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