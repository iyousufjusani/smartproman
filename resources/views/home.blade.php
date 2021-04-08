@extends('layouts.index')
@section('header', 'bg-init bg')

@section('css')
@endsection
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
                        <h5 class="text-center"> {{ __('Welcome, ') }} <span class="text-capitalize">{{ Auth::user()->name }}</span>{{ __(' to ') }} <span
                                    class="color">{{config('app.name', 'SmartProMan') . __('!') }}</span></h5>

                        <hr>
                        <p style="font-size: 1.4rem; text-align: justify">{{ __('Following topics you will learn in HVAC Engineering Professional Club!')}}</p>
                        <ol style="font-size: 1.3rem; list-style: circle;">
                            @foreach($topics as $topic)
                                <li>
                                    <b style="font-weight: 700;">{{ $topic -> title }}  </b>( {{ $topic->questions->count()  }}
                                    Questions ).
                                </li>
                            @endforeach
                        </ol>
                        {{--@dd($topics)--}}
                            {{--@dd($topics[0]->questions[0]->id)--}}

                            <div class="text-center">
                            <a href="/learning/{{$topics[0]->id}}/{{$topics[0]->questions[0]->id }}" class="slideshow-slide-caption-subtitle -load o-hsub -link"
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