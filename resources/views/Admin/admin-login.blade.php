<!DOCTYPE html>
<html lang="{{config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <title>{{config('app.name', 'SmartProMan')}} - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

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

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="m-t-40 card-box">
                        <div class="text-center">
                            <h2 class="text-uppercase m-t-0 m-b-30">
                                <a href="index.php" class="text-success">
                                    <span style="color: black">SmartProMan</span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">


                            <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12">
                                        <label for="emailaddress">Email address</label>
                                        <input placeholder="Enter Admin email address" id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12">

                                        <label for="password">Password</label>
                                        <input placeholder="Enter Admin password" id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <div class="col-xs-12" style="padding-left: 10px;">
                                        <input  type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted font-14" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                               class="text-muted pull-right font-14">{{ __('Forgot Your Password?') }}</a>

                                        @endif
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn-login">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <!-- end card-box-->

                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>


<!-- jQuery  -->
<script src="{{asset('assets/Admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/waves.js')}}"></script>
<script src="{{asset('assets/Admin/js/jquery.slimscroll.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/Admin/js/jquery.core.js')}}"></script>
<script src="{{asset('assets/Admin/js/jquery.app.js')}}"></script>

</body>
</html>