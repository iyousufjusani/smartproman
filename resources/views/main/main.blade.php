@extends('layouts.index')
@section('header', 'bg-init bg')

@section('content')

    <br><br>

    <br>
    <section aria-label="section" class="container-fluid text-center">
        <div>
            <form method="POST" action="question_process.php" class="text-center">
                <div class="col-md-12 ">
                    <div class='dflex-center'>
                        <div class='col-home'>
                            <div class='heading' style="text-align: center">{{ $topic->title }}</div>
                            <div class='content'>
                                <p class="question-number"><b
                                            style="font-weight: 700">Question {{ $question -> number }}
                                        of {{ $total_questions }} : </b></p>
                                <p class="question-text">{{ $question -> text }} </p>
                            </div>

                            <ul class='list-home option-container'>
                                @foreach($options as $i => $option)
                                    <li id="{{$i}}" value="{{ $option->is_correct }}"
                                        class="option-list"
                                        onclick="getResult('{{$i}}','{{ $topic->id }}')">
                                        {{ $option->text }}
                                    </li>
                                @endforeach
                            </ul>
                            <div>
                                {{--<input type="hidden" name="score" value="<?php echo $score; ?>">--}}
                                {{--<input type="hidden" name="topic" value="<?php echo $topicID; ?>">--}}
                                {{--<input type="hidden" name="number" value="<?php echo $number; ?>">--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div style="display: flex; flex-direction: row; justify-content: center " class="text-center">
                        {{--<button name="previous-button"--}}
                                {{--style="border: 3px solid black; padding: 10px; border-radius: 5px; color: white; background-color: red; font-weight: 600; width: 150px; text-align: center;">--}}
                            {{--Previous--}}
                        {{--</button>--}}

                        <button class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                style="background-color: #ffb41d;">
                            <span class="shine"></span>
                            <span class="slideshow-slide-caption-subtitle-label">{{ __('Back') }}</span>
                        </button>&nbsp;

                        <button class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                style="background-color: #ffb41d;">
                            <span class="shine"></span>
                            <span class="slideshow-slide-caption-subtitle-label">{{ __('Next') }}</span>
                        </button>

                        {{--<button name="next-button"--}}
                                {{--style="border: 3px solid black; padding: 10px; border-radius: 5px; color: white; background-color: red; font-weight: 600; width: 150px; text-align: center">--}}
                            {{--Next--}}
                        {{--</button>--}}


                    </div>
                </div>
            </form>
        </div>


    </section>


    <hr style="border-bottom: 4px solid red; margin: 50px">


    <section aria-label="section" class='container-fluid'>
        <div class='row m-2-hor'>
            <div class='col-12 mb-5'>
                <div class='heading'>Text Book</div>
            </div>

            <div class="col-md-12">


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

            </div>

        </div>
    </section>


    <hr style="border-bottom: 4px solid red; margin: 50px">

    <!--related Videos Sections-->
    <section aria-label="section" class='container-fluid onStep' data-animation="fadeInUp" data-time="0">
        <div class='row m-2-hor'>
            <div class='col-12 mb-5'>
                <div class='heading'>Related Videos</div>
            </div>

            <div class="col-12">

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

            </div>

        </div>
    </section>


@endsection




@section('script')
@endsection