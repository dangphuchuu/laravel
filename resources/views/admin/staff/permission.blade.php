@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-menu bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.staff')</h4>
                    <span>@lang('lang.permission')</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/admin/staff/list"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">@lang('lang.staff')</li>
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
                        <div class="card-header">
                            <h5>@lang('lang.edit') @lang('lang.staff') :{!! $user['username'] !!}</h5>
                            <!-- @if(isset($roles))
                            <h5>Role:{!! $roles !!}</h5>
                            @else
                            <h5>Role:Tài khoản này chưa có vai trò</h5>
                            @endif -->
                        </div>
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                {{ $arr }}<br>
                                @endforeach

                            </div>
                            @endif

                            <form action="admin/staff/permission/{!! $user['id'] !!}" method="POST">
                                @csrf
                                @foreach($permission as $permis)
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                @foreach($user_per as $pr)
                                @if($pr['id'] == $permis['id'])
                                checked
                                @endif
                                @endforeach
                                name="permission[]"  value="{!! $permis['name'] !!}" id="{!! $permis['id'] !!}">
                                <label class="form-check-label" for="{!! $permis['id'] !!}">
                                    {!! $permis['name'] !!}
                                </label>
                                </div>
                                @endforeach
                                <div class="form-group ">
                                    <label class="col-sm-1"></label>
                                    <div class="">
                                        <button type="button" class="btn btn-warning m-b-0" onclick='selects()' value="Select All">@lang('lang.select_all')</button>  
                                        &nbsp;
                                        <button type="button" class="btn btn-danger m-b-0" onclick='unselects()' value="Select All">@lang('lang.unselect_all')</button>  
                                        <br><br>
                                        <button type="submit" class="btn btn-primary m-b-0">@lang('lang.update')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script>
function selects() {
    var ele = document.getElementsByName('permission[]');
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox')
            ele[i].checked = true;
        }
    }
function unselects(){  
    var ele=document.getElementsByName('permission[]');  
    for(var i=0; i<ele.length; i++){  
        if (ele[i].type=='checkbox')  
            ele[i].checked=false;        
        }  
    }             
</script>
@endsection
