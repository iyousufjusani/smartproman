@extends('layouts.index')
@section('header', 'bg-init bg')

@section('content')

    <style>

        .custom-container {
            position: relative;
            transform: translate(-50%, -50%);
            top: 10%;
            left: 50%;
        }

        input[type="radio"] {
            display: none;
        }

        label.radio-label {
            position: relative;
            color: black;
            font-size: 30px;
            border: 3px solid black;
            border-radius: 5px;
            padding: 10px 50px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        input[type="radio"]:checked + label.radio-label {
            background-color: red;
            color: white;
            font-weight: 600;
        }


    </style>

    <br><br>

    <br>
    {{--    @dd($topic)--}}
    @if($topic)

        <section aria-label="section" class="container-fluid text-center">
            <div>

                {{--<div class="custom-container">--}}
                {{--<input type="radio" name="size" id="small" checked required>--}}
                {{--<label for="small" class="radio-label">Small</label>--}}
                {{--<input type="radio" name="size" id="large" required>--}}
                {{--<label for="large" class="radio-label">Large</label>--}}
                {{--</div>--}}

                <form role="form" method="post" action="{{ action('MainController@nextQuestion') }}" class="text-center"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    {{--@dd($topic)--}}
                    <div class="col-md-12 ">

                        <div class='dflex-center'>
                            <div class='col-home'>
                                <div class='heading' style="text-align: center">{{ $topic->title }}</div>
                                <div class='content'>
                                    {{--@dd($topic)--}}
                                    <p class="question-number"><b
                                                style="font-weight: 700">Question {{ $question -> number }}
                                            of {{ $topic -> questions -> count() }} : </b></p>
                                    <p class="question-text">{{ $question -> text }} </p>
                                </div>

                                <div hidden>
                                    {{--<input type="hidden" name="right" value="{{ $right }}">--}}
                                    {{--<input type="hidden" name="wrong" value="{{ $wrong }}">--}}
                                    {{--<input type="hidden" name="skip" value="{{ $skip }}">--}}
                                    {{--                                    <input type="hidden" name="topic" value="{{$topic->id}}"/>--}}
                                    {{--                                    <input type="hidden" name="number" value="{{$question->number}}"/>--}}
                                    {{--                                    <input type="hidden" name="questionId" value="{{$question->id}}"/>--}}
                                </div>

                                {{--<ul class='list-home option-container'>--}}
                                <div>
                                    @php
                                        $collection =  $question->options->shuffle()
                                    @endphp
                                    @foreach( $collection as $i => $option)
                                        {{--<li>{{ $error }}</li>--}}
                                        <input type="radio"
                                               name="option" id="{{$i}}"
                                               value="{{ $option-> id }}"
                                               onclick="getResult('{{$option}}' , '{{$collection}}' )"
                                        />

                                        <label for="{{$i}}"
                                               class="radio-label text-capitalize">{{ $option->text }}</label>

                                        {{--<li id="{{$i}}" value="{{ $option->id }}"--}}

                                        {{--style="color: black !important; border-color: black !important;"--}}
                                        {{--onclick="getResult('{{$option}}' , '{{$collection}}' )">--}}
                                        {{--onclick="getResult('{{$i}}','{{ $topic->id }}')">--}}
                                        {{--onclick="window.location='{{ url("/learning/check") }}'">--}}
                                        {{--@dd($question)--}}

                                        {{--<span id="{{$i}}" class="-load o-hsub -link" type="radio" required--}}
                                        {{--name="option" value="{{ $option-> id }}">--}}

                                        {{--<span class="shine"></span>--}}
                                        {{--<label id="{{$i}}"--}}
                                        {{--class="slideshow-slide-caption-subtitle-label">{{ $option->text }}</label>--}}

                                        {{--<input hidden id="listTagValue" type="text" name="list"--}}
                                        {{--value="{{ $option-> id }}">--}}

                                        {{--</li>--}}
                                    @endforeach
                                </div>
                                {{--</ul>--}}

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <div style="display: flex; flex-direction: row; justify-content: center " class="text-center">

                            <button type="submit" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                    formaction="{{ action('MainController@skipQuestion') }}"
                                    name="skip" value="skip"
                                    style="background-color: red !important; border-color: red !important; text-transform: uppercase;">
                                <span class="shine"></span>
                                <span class="slideshow-slide-caption-subtitle-label">{{ __('Skip') }}</span>
                            </button>&nbsp;&nbsp;
                            <button type="submit" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                    name="next" value="next"
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

        {{--related Videos Sections--}}
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
    @else
        <section aria-label="section" class="container-fluid text-center">
            <div>
                <br><br>

                <h1 class="text-capitalize">No Content Uploaded!!!</h1>
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
    <script type="text/javascript">

        function getResult($option, $array) {

            console.log('function');

            var options = JSON.parse($array);


            var result = options.filter(function (item) {
                return item.is_correct === 1
            });

            console.log("Right: " + result[0].id);

            console.log("===>");
            for (var i = 0; i < 4; i++) {

                var ovalue = document.getElementById(i).value;
                console.log(ovalue);
                if (ovalue == result[0].id) {
                    var const_id = ovalue;

                }

                // $('#i :input:checked').css({'background-color': 'red', 'color': 'white'});
                // $('label').css({'background-color': 'red', 'color': 'white'});
                // $('label').css('background-color', 'red');

                // document.getElementById(i).style.background = "red";
                // document.getElementById(i).style.color = "white";
                // console.log("Wrong Answer");

                // document.getElementById(i).onclick = function () {
                //     this.disabled = true;
                // };
                // this.disabled = true;
            }
            var my_css_class = {backgroundColor: 'green', color: '#000'};
            console.log("Right ansewr id: " + const_id);
            $('#' + const_id).css(my_css_class);

            // $('label#' + const_id).css({'background-color': 'green'});

            console.log('we here')
            document.getElementById(const_id).style.background = "green";
            // document.getElementById(const_id).style.color = "white";
            // console.log("Right Answer");

            // var radioName = $(this).attr("option"); //Get radio name
            // $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name

            // $('input[name=option]').attr("disabled", true);
        }

        // $(":radio").click(function(){
        //     var radioName = $(this).attr("option"); //Get radio name
        //     $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
        // });

    </script>
@endsection