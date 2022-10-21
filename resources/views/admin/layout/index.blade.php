<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Admin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <base href="{{asset('')}}">
    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/feather.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/font-awesome-n.min.css">
    <link rel="stylesheet" href="admin_asset/css/chartist.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/widget.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/new.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="icon" href="upload/icon/icon.jpg">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.layout.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('admin.layout.menu')
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            @yield('content')
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                            @endif
                            @if (session('canhbao'))
                            <div class="alert alert-warning">
                                {{ session('canhbao') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="admin_asset/ckeditor/ckeditor.js"></script>

    <!-- <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js"></script> -->

    <script data-cfasync="false" src="admin_asset/dist/js/email-decode.min.js"></script>

    <script type="text/javascript" src="admin_asset/dist/js/jquery.min.js"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/jquery-ui.min.js"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/popper.min.js"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->

    <script src="admin_asset/dist/js/waves.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="admin_asset/dist/js/jquery.slimscroll.js"></script>

    <script src="admin_asset/dist/js/jquery.flot.js" type="text/javascript"></script>

    <script src="admin_asset/dist/js/jquery.flot.categories.js" type="text/javascript"></script>

    <script src="admin_asset/dist/js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/jquery.flot.tooltip.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="admin_asset/dist/js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/custom-dashboard.min.js"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/script.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="admin_asset/dist/js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
    @yield('script')

</body>

</html>