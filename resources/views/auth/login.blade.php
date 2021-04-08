@extends('layouts.index')
@section('header', 'bg-init bg')

@section('content')
    <br><br>

    <section aria-label="section" class='container-fluid pb-0 onStep' data-animation="fadeInUp" data-time="300">
        <div class='row m-2-hor'>
            <div class='col-md-12'>

            </div>
        </div>
    </section>
    <style>
        .background-image {
            background-image: url('{{ asset("uploads/smartproman_bg.jpeg")}}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        @media (max-width: 768px) {
            .background-image {
                background-image: none;
            }
        }

    </style>
    <section class='container-fluid background-image' aria-label="section" data-animation="fadeInUp" data-time="300">
        <div class='row m-2-hor'>

            <div class="col-md-12" style="text-align: center">
                <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card bg-transparent">
                                <div class="card-header bg-transparent" ><h3 class="heading">{{ __('Login') }}</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- email address--}}
                                        <div class="form-group row">
                                            <label for="email"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" placeholder="Enter your Email Address"
                                                       value="{{ old('email') }}" required autocomplete="email"
                                                       style="color: black; font-size: 1rem;"
                                                       autofocus>

                                                @error('email')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--Password--}}
                                        <div class="form-group row">
                                            <label for="password"
                                                   class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" placeholder="Enter your Password"
                                                       required autocomplete="current-password"
                                                       style="color: black; font-size: 1rem;">

                                                @error('password')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--Remember me--}}
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="col-md-6 offset-md-3">
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-3">
                                                <button type="submit" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                                        style="background-color: #ffb41d;" name="login-button">
                                                    <span class="shine"></span>
                                                    <span class="slideshow-slide-caption-subtitle-label">{{ __('Login') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>
            <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>
            <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>

        </div>
    </section>


@endsection
