<!DOCTYPE html>
<html lang="{{config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name', 'SmartProMan')}} - Home</title>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta content="" name="keywords">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <!-- icon -->
    <link href="{{asset('assets/main/img/favicon.gif')}}" rel="icon" sizes="32x32" type="image/png">
    <!-- plugin css -->
    <link href="{{asset('assets/plugin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugin/css/slidercss.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugin/css/animsition.min.css')}}" rel="stylesheet">
    <!-- font themify CSS -->
    <link href="{{asset('assets/main/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/main/css/themify-icons.css')}}" rel="stylesheet">
    <!-- font awesome CSS -->
    <link href="{{asset('assets/main/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/main/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!-- main css -->
    <link href="{{asset('assets/main/css/scroll.css')}}" rel="stylesheet">
    <link href="{{asset('assets/main/css/scroll.css')}}" rel="stylesheet">
    <link href="{{asset('learning')}}" rel="stylesheet">
    <link href="{{asset('assets/main/css/animated-on3step.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugin/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugin/css/owl.theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/main/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/main/css/media.css')}}" media="all" rel="stylesheet">
</head>


<body class="@yield('header')">

<!-- preloader -->
<div id="preloader">
    <div class="loader">
        <div class="spinner"></div>
    </div>
</div>
<!-- preloader -->

<!-- content-wrapper -->
<div class="content-wrapper animsition-overlay">

    <!-- header -->
@include('includes.header')
<!-- header end -->


    <!-- main menu -->
@include('includes.menu')
<!-- main menu end -->



@yield('css')
@yield('content')
@yield('script')

<!-- footer -->
@include('includes.footer')
<!-- footer end -->


</div>
<!-- content-wrapper end -->

<!-- plugin js -->
<script src="{{asset('assets/plugin/js/pluginson3step.js')}}"></script>
<script src="{{asset('assets/plugin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugin/js/velocity.min.js')}}"></script>
<script src="{{asset('assets/plugin/js/sticky.js')}}"></script>
<script src="{{asset('assets/plugin/js/slider.js')}}"></script>

<!-- main js -->
<script src="{{asset('assets/main/js/main.js')}}"></script>


</body>
</html>