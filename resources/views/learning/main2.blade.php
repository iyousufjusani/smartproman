@extends('layouts.index')
@section('header', 'bg-init bg')


@section('content')

    <style>
        ul.option {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            list-style: none;
            text-align: center;
        }

        ul.option > li {
            /*display: table-cell;*/
            /*display: inline;*/
            width: 30px;
            border: 2px solid black;
            padding: 5px;
            margin: 5px;
            text-align: center;
            cursor: pointer;

        }

        .myTable-link {
            font-size: 12px;
            font-weight: 600;
            padding-left: 20px;
        }

    </style>

    <br><br>
    {{--@dd('main2')--}}
    <br>
    {{--    @dd($details)--}}
    {{--    @dd($questions)--}}
    @if($topic && $details)

        <section aria-label="section" class="container-fluid text-center">
            <div>

                {{--<div class="custom-container">--}}
                {{--<input type="radio" name="size" id="small" checked required>--}}
                {{--<label for="small" class="radio-label">Small</label>--}}
                {{--<input type="radio" name="size" id="large" required>--}}
                {{--<label for="large" class="radio-label">Large</label>--}}
                {{--</div>--}}

                <form role="form" method="post"
                      {{--action="{{ action('MainController@nextQuestion') }}" --}}
                      class="text-center"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    {{--                    @dd($topic)--}}
                    {{--@dd(session()->get('learning'))--}}
                    <div class="col-md-12 ">

                        <div class='dflex-center'>
                            <div class='col-home'>
                                <div class='heading' style="text-align: center">{{ $topic->title }}</div>
                                <div class="row" style="display: flex; justify-content: center">
                                    <img src="{{ url("uploads/topic_images/" , $details -> image)}}" alt="chp_5_1">
                                </div>
                                <div class='content'>
                                    {{--@dd($topic)--}}
                                    {{--<p class="question-number"><b--}}
                                    {{--style="font-weight: 700">Question question -> number--}}
                                    {{--of {{ $topic -> questions -> count() }} : </b></p>--}}
                                    {{--<p class="question-text"> question -> text </p>--}}

                                    {{--@for ($i = $details -> start_question; $i >= $details -> end_question; $i++)--}}
                                    {{--<p class="question-text"> question -> text </p>--}}
                                    {{--@endfor--}}

                                    <div class="row">
                                        @foreach( $questions as $index =>  $question)
                                            <div class="col-lg-3 col-md-6 col-xs-12" style="text-align: center">
                                                {{--<h6 class="myTable-link">1. HIGH PRESS SAFETY</h6>--}}
                                                <h6 class="myTable-link ">{{ $question -> text }}</h6>
                                                @php
                                                    $collection =  $question->options->shuffle()
                                                @endphp
                                                <ul class="option">
                                                    @foreach( $collection as $i => $option)
                                                        <li>{{$option->text}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                <div hidden>
                                    {{--<input type="hidden" name="right" value="{{ $right }}">--}}
                                    {{--<input type="hidden" name="wrong" value="{{ $wrong }}">--}}
                                    {{--<input type="hidden" name="skip" value="{{ $skip }}">--}}
                                    {{--<input type="hidden" name="topic" value="{{$topic->id}}"/>--}}
                                    {{--<input type="hidden" name="number" value="{{$question->number}}"/>--}}
                                    {{--<input type="hidden" name="questionId" value="{{$question->id}}"/>--}}
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <div style="display: flex; flex-direction: row; justify-content: center " class="text-center">

                            <button type="button" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                    style="background-color: red !important; border-color: red !important; text-transform: uppercase;"
                                    name="button" value="skip">Skip
                                {{--<span class="shine"></span>--}}
                                {{--<span class="slideshow-slide-caption-subtitle-label">{{ __('Back') }}</span>--}}
                            </button>&nbsp;&nbsp;
                            <button type="button" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                    name="button" value="next"
                                    style="background-color: red !important; border-color: red !important; text-transform: uppercase;">
                                <span class="shine"></span>
                                <span class="slideshow-slide-caption-subtitle-label">{{ __('Next') }}</span>
                            </button>

                        </div>
                    </div>
                </form>
            </div>


        </section>


        <hr style="border-bottom: 4px solid red; margin: 50px">

        {{--related topic page image--}}
        <section aria-label="section" class='container-fluid'>
            <div class='row m-2-hor'>
                <div class='col-12 mb-5'>
                    <div class='heading'>Text Book</div>
                </div>

                <div class="col-md-12">
                    {{--@dd($pages)--}}
                    @if($pages->count() > 0)
                        <div id="owl-team" class="owl-carousel owl-theme slick slickteam">

                            @foreach($pages as $page)
                                <div class='item'>

                                    <img style="height: 500px"
                                         id="myImg"
                                         src="{{ url("uploads/topic_images/" , $page -> image)}}"
                                         class="img-fluid myImg1"
                                         alt="topic-img"
                                         onclick="setImageId('{{$page->id}}');"
                                    />

                                    <div class='desc'>
                                        <div class='title'
                                             style="color: red; font-weight: 900">{{$page->title}}</div>
                                    </div>

                                </div>
                                {{--$imageId = $row['imageID']--}}
                            @endforeach
                        </div>
                    @else
                        No related Text Book Images
                    @endif
                </div>

            </div>
        </section>


        <hr style="border-bottom: 4px solid red; margin: 50px">

        {{--related Videos Sections--}}
        <section aria-label="section" class='container-fluid onStep' data-animation="fadeInUp" data-time="0">
            <div class='row m-2-hor'>
                <div class='col-12 mb-5'>
                    <div class='heading'>Related Videos</div>
                </div>

                <div class="col-md-12">
                    @if($videos->count() > 0)
                        <div id="owl-news" class="owl-carousel owl-theme slick slicknews">
                            @foreach($videos as $video)
                                <div class='item'>

                                    <iframe width="450" height="490" src="{{ $video->link }}" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    <!--<div class='bg'>-->

                                    <!--&lt;!&ndash;<img-->
                                    <!--src="assets/img/news/img1.jpg"-->
                                    <!--class="img-fluid"-->
                                    <!--alt="Imageteam"-->
                                    <!--/>&ndash;&gt;-->
                                    <!--</div>-->
                                    <div style="color: black; text-align: center">
                                        <!--                            <div class='date'> Sept 08, 2020</div>-->
                                        <div class='date'>
                                            @php
                                                $time = $video->updated_at;
                                                $old_date = date($time);
                                                $old_date_timestamp = strtotime($old_date);
                                                $new_date = date('F d, Y', $old_date_timestamp);
                                                echo $new_date;
                                            @endphp
                                        </div>
                                        <div class="name" style="font-weight: 900"> {{ $video-> title }}</div>
                                    </div>

                                    <!--<div class='icon'>-->
                                    <!--<a class="animsition-link" data-animsition-out-class="overlay-slide-out-left"-->
                                    <!--href="#">-->
                                    <!--Read More-->
                                    <!--</a>-->
                                    <!--</div>-->
                                </div>

                            @endforeach

                        </div>
                    @else
                        No related Videos in this topic
                    @endif

                </div>

            </div>
        </section>

    @else
        <section aria-label="section" class="container-fluid text-center">
            <div>
                <br><br>

                <h1 class="text-capitalize">No topics uploaded!!!</h1>
                <br><br>
                <hr style="border-bottom: 4px solid red; margin: 50px">

                <div class="text-center">
                    <a href="/home" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                       style="background-color: #ffb41d;">
                        <span class="shine"></span>
                        <span class="slideshow-slide-caption-subtitle-label">{{ __('Back to home') }}</span>
                    </a>
                </div>
                <p></p>
            </div>


        </section>

    @endif


@endsection


@section('script')



@endsection