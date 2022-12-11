<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! ($about!=null)?$about['name']:'' !!} Home</title>
    <base href="{{asset('')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="upload/icon/{!! ($about!=null)?$about['icon']:'' !!}" type="image/x-icon">
    <!-- Css Styles -->
    <link rel="stylesheet" type="text/css" href="admin_asset/css/font-awesome-n.min.css">
    <link rel="stylesheet" href="user_asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="user_asset/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Reponsive header -->
    @include('user.layout.header_mobile')
    <!-- Reponsive header End -->

    <!-- Header Section Begin -->
    @include('user.layout.header')
    <!-- Header Section End -->
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
    <!-- Hero Section Begin -->
    <div id="notifDiv"></div>
    @yield('content')

    <!-- Footer Section Begin -->
    @include('user.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="user_asset/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="user_asset/js/bootstrap.min.js"></script> -->
    <script src="user_asset/js/jquery.nice-select.min.js"></script>
    <script src="user_asset/js/jquery-ui.min.js"></script>
    <script src="user_asset/js/jquery.slicknav.js"></script>
    <script src="user_asset/js/mixitup.min.js"></script>
    <script src="user_asset/js/owl.carousel.min.js"></script>
    <script src="user_asset/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    @yield('script')


</body>

</html>