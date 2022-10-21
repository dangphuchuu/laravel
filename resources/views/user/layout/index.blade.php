<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! ($about!=null)?$about['name']:'' !!} Home</title>
    <base href="{{asset('')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
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

    <!-- Hero Section Begin -->
   
	@yield('content')
    <!-- Footer Section Begin -->
   	@include('user.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="user_asset/js/jquery-3.3.1.min.js"></script>
    <script src="user_asset/js/bootstrap.min.js"></script>
    <script src="user_asset/js/jquery.nice-select.min.js"></script>
    <script src="user_asset/js/jquery-ui.min.js"></script>
    <script src="user_asset/js/jquery.slicknav.js"></script>
    <script src="user_asset/js/mixitup.min.js"></script>
    <script src="user_asset/js/owl.carousel.min.js"></script>
    <script src="user_asset/js/main.js"></script>
	@yield('script')


</body>

</html>