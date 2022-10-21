@extends('admin.layout.index')
@section('content')
@role('admin')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h4>@lang('lang.about')</h4>
                    {{-- <span></span> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">@lang('lang.about')</a> </li>
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
                            <h5>@lang('lang.edit') @lang('lang.about')</h5>
                        </div>
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                    {{$arr}}<br>
                                @endforeach

                            </div>
                            @endif
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                            @endif
                            <form action="admin/about" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">icon</label>
                                    <div class="col-sm-11">
                                        @if($about!=null)
                                        <img src="upload/icon/{!! $about['icon'] !!}" width="300px" alt="">
                                        @endif
                                        <br>
                                        <input type="file" name="Image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Logo</label>
                                    <div class="col-sm-11">
                                        @if($about!=null)
                                        <img src="upload/logos/{!! $about['logo'] !!}" width="300px" alt="">
                                        @endif
                                        <br>
                                        <input type="file" name="Image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.web_name')</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->name:""}}" name="name"
                                            placeholder="" >
                                        <span class="messages"></span>   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.title')</label>                           
                                    <div class="col-sm-11">                                    
                                        <textarea  class="form-control" name="title"
                                            rows="5" cols="50" >{{($about!=null)?$about->title:""}}</textarea>
                                        <span class="messages"></span>
                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.phone')</label>
                                   
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->phone:""}}" name="phone"
                                            placeholder="" >
                                        <span class="messages"></span>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->email:""}}" name="email"
                                            placeholder="" >
                                        <span class="messages"></span>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.address')</label>
                                    <div class="col-sm-11">
                                       
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->address:""}}" name="address"
                                            placeholder="" >
                                        <span class="messages"></span>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.social_network')</label>
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->linkfanpage:""}}" name="linkfanpage"
                                            placeholder="" >
                                        <span class="messages"></span>
                         
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Copyright</label>
                                    <div class="col-sm-11">
                                    
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->copyright:""}}" name="copyright"
                                            placeholder="" disabled>
                                        <span class="messages"></span>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">@lang('lang.worktime')</label>
                                    <div class="col-sm-11">
                                       
                                        <input type="text" class="form-control" value="{{($about!=null)?$about->worktime:""}}" name="worktime"
                                            placeholder="" >
                                        <span class="messages"></span>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
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
@else
<h1 align="center"> không có quyền truy cập</h1>
@endrole
@endsection
