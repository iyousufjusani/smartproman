@extends('layouts.index')

@section('content')
    <!-- slider -->
    <section class="slideshow" id="js-header" aria-label="slider">
        <div class="slideshow-slide js-slider-home-slide is-current" data-slide="1">
            <div class="slideshow-slide-background-parallax background-absolute js-parallax" data-speed="-1"
                 data-position="top" data-target="#js-header">
                <div class="slideshow-slide-background-load-wrap background-absolute">
                    <div class="slideshow-slide-background-load background-absolute">
                        <div class="slideshow-slide-background-wrap background-absolute">
                            <div class="slideshow-slide-background background-absolute">
                                <div class="slideshow-slide-image-wrap background-absolute">
                                    <style>
                                        .background-image {
                                            background-image: url('{{ asset("uploads/smartproman_bg.jpeg")}}');
                                        }
                                        @media (max-width: 768px) {
                                            .background-image {
                                                background-image: none;
                                            }
                                        }
                                    </style>
                                    <div class="slideshow-slide-image background-absolute background-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slideshow-slide-caption">
                <div class="slideshow-slide-caption-text">
                    <div class="js-parallax" data-speed="2" data-position="top" data-target="#js-header"
                         style="text-align: center">
                        <div class="slideshow-slide-caption-title">{{$title}}</div>
                        <div class="slideshow-sub-title"><span class="color">{{$subtitle}}</span>
                        </div>
                        <a class="slideshow-slide-caption-subtitle -load o-hsub -link" href="{{route('login')}}">
                            <span class="shine"></span>
                            <span class="slideshow-slide-caption-subtitle-label">Get Started</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- left right navigation -->
        <div class="wrap-btn-slider">
            <button class="o-button -white -square -left js-slider-home-button js-slider-home-prev" type="button">
                    <span class="o-button_label">
                        <i class="fa fa-chevron-left"></i>
                    </span>
            </button>
            <button class="o-button -white -square js-slider-home-button js-slider-home-next" type="button">
                    <span class="o-button_label">
                        <i class="fa fa-chevron-right"></i>
                    </span>
            </button>
        </div>
        <!-- left right navigation end -->

    </section>
    <!-- slider end -->
@endsection