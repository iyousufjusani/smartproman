@extends('layouts.index')
@section('header', 'bg-init bg')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>
                <br><br>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="text-center"> {{ __('Welcome, ') . Auth::user()->name . __(' to ') }} <span
                                    class="color">{{config('app.name', 'SmartProMan') . __('!') }}</span></h5>

                        <hr>
                        {{ __('Following topics you learn here in HVAC Engineering Professional Club!')}}
                        <ul>
                            @foreach($topics as $topic)
                                <li><b>{{ $topic -> title }} </b></li>
                            @endforeach
                        </ul>

                        <div class="text-center">
                            <a href="/learning" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                               style="background-color: #ffb41d;">
                                <span class="shine"></span>
                                <span class="slideshow-slide-caption-subtitle-label">{{ __('Start Learning') }}</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="heading mt-5 pt-5 mb-0">&nbsp;</h1>

@endsection

@section('script')
@endsection