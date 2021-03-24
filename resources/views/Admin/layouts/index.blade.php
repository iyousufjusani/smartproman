<!DOCTYPE html>
<html lang="{{config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name', 'SmartProMan')}} - AdminPanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/Admin/')}}assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('assets/Admin/plugins/morris/morris.css')}}">

    <!-- App css -->
    <link href="{{asset('assets/Admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/Admin/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/Admin/css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/Admin/css/style.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset('assets/Admin/js/modernizr.min.js')}}"></script>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Top Bar Start -->

    @include('Admin.includes.topBar')


    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    @include('Admin.includes.sideBar')


    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('admin-content')
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->



</div>
<!-- END wrapper -->


<!-- jQuery  -->
<script src="{{asset('assets/Admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/waves.js')}}"></script>
<script src="{{asset('assets/Admin/js/jquery.slimscroll.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets/Admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/raphael/raphael-min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('assets/Admin/pages/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/Admin/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/Admin/js/jquery.app.js')}}"></script>

</body>
</html>



