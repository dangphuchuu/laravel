@extends('admin.layout.index')
@section('content')
<style>
    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 2000px;
        }
    }
</style>
@if($user!=null)
<div class="container ">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if(isset($user['image']))
                            <img src="upload/avatar/{!! $user['image'] !!}" alt="Admin" class="rounded-circle" width="200px">
                            @else
                            <img src="upload/avatar/avatar.jpg" alt="Admin" class="rounded-circle" width="200px">
                            @endif
                            <div class="mt-3">
                                <h4>{!! $user['username'] !!}</h4>
                                @foreach($user['roles'] as $role)
                                <p class="text-secondary mb-1">@lang('lang.role'): {!! $role['name'] !!}</p>
                                @endforeach
                                <p class="text-muted font-size-sm">@lang('lang.amount') @lang('lang.permission'): {!! $user['permissions']->count() !!}</p>
                                <form action="admin/editimg" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label>Đổi ảnh</label>
                                    <input type='file' name='Image' class="form-control">
                                    <button type="submit" class="btn btn-danger bg-gradient">@lang('lang.submit')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <form action="admin/edit_facebook" method="POST">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://bootdey.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>Github</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li> -->

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>Facebook</h6>
                                <input type="text" value="{!! $user['facebook'] !!}" class="form-control text-secondary" name="facebook">
                                <button type="submit" class="btn btn-danger bg-gradient">@lang('lang.submit')</button>
                            </li>
                            <div class="panel ps-3 ">
                                <div class="panel-heading ">
                                    <span class="panel-icon">
                                        <i class="fa fa-trophy"></i>
                                    </span>
                                    <span class="panel-title"> My Permissions</span>
                                </div>
                                <div class="panel-body d-flex flex-wrap">
                                @foreach($user['permissions'] as $per)
                                @if($per['id'] %2 ==0)
                                    <div class="label label-primary bg-gradient mr5 mb-2 ib lh15 ms-2 ">{!! $per['name'] !!}</div>
                                @elseif($per['id'] %3 ==0)
                                    <div class="label label-info bg-gradient mr5 mb-2 ib lh15 ms-2 ">{!! $per['name'] !!}</div>
                                    @else
                                    <div class="label label-success bg-gradient mr5 mb-2 ib lh15 ms-2 ">{!! $per['name'] !!}</div>
                                @endif
                                @endforeach

                                </div>
                            </div>
                            <!-- <li class="d-flex justify-content-around flex-row bd-highlight mt-3 flex-wrap">
                            @foreach($user['permissions'] as $per)
                                <p class="rounded-pill text-center w-25 p-3 bg-warning bg-gradient shadow m-3">
                                {!! $per['name'] !!}
                                </p>
                                @endforeach
                            </li> -->

                        </ul>
                    </form>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                {{ $arr }}<br>
                                @endforeach
                            </div>

                            <hr>
                        </div>
                        @endif
                        <form action="admin/edit" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.fristname')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{!! $user['firstname'] !!}" class="form-control" name="firstname" placeholder="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.lastname')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{!! $user['lastname'] !!}" class="form-control" name="lastname" placeholder="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{!! $user['email'] !!}" class="form-control" name="email" placeholder="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.phone')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="phone" value="{!! $user['phone'] !!}" class="form-control" name="phone" placeholder="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.joining_date')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                {!! date("d-m-Y H:m:s", strtotime($user['created_at'])) !!}
                                </div>
                            </div>
                            <hr>
                            <input type="checkbox" id="checkChangpasswordprofile" name="changepasswordprofile">
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.password')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="password form-control" name="password" disabled placeholder="Enter Password" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('lang.password_again')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" class="password form-control" name="passwordagain" disabled placeholder="Enter RePassword" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary bg-gradient " target="__blank">@lang('lang.update')</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

               



            </div>

        </div>

    </div>
</div>
@endif
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#checkChangpasswordprofile').change(function() {
            if ($(this).is(":checked")) {
                $('.password').removeAttr('disabled');
            } else {
                $('.password').attr('disabled', '');
            }
        });
    });
</script>
@endsection