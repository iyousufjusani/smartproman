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

        input[type="submit"].answer-submit {
            background-color: transparent;
            position: relative;
            color: black;
            width: 100%;
            font-size: 30px;
            border: 3px solid black;
            border-radius: 5px;
            padding: 10px 50px;
            margin: 5px;
            display: flex;
            align-items: center;
            cursor: pointer;
            text-align: center;
        }

        .option-container .option {
            position: relative;
            color: black;
            font-size: 30px;
            border: 3px solid black;
            border-radius: 5px;
            padding: 10px 50px;
            display: flex;
            align-items: center;
            cursor: pointer;
            margin-bottom: 5px;
        }


        .option-container .option.correct::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: green;
            z-index: -1;

        }

        .correct::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: green;
            z-index: -1;

        }

        .option-container .option.wrong::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: red;
            z-index: -1;

        }

        .wrong::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: red;
            z-index: -1;

        }

        .option-container .option.correct {
            color: white;
        }

        .correct {
            color: white;
        }

        .option-container .option.wrong {
            color: white;
        }

        .wrong {
            color: white;
        }

        .option-container .option.already-answered {
            pointer-events: none;
        }

        .already-answered {
            pointer-events: none;
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
                    <div class="col-md-10 center">
                        <div class='dflex-center'>
                            <div class='col-home'>
                                <div class='heading' style="text-align: center">{{ $topic->title }}</div>
                                <div class='content'>
                                    {{--@dd($question)--}}
                                    <p class="question-number1"><b
                                                style="font-weight: 700">Question {{ $question -> number }}
                                            of {{ $topic -> questions -> count() }} : </b></p>
                                    <p class="question-text1">{{ $question -> text }} </p>
                                </div>

                                {{--<div hidden>--}}
                                {{--<input type="hidden" name="right" value="{{ $right }}">--}}
                                {{--<input type="hidden" name="wrong" value="{{ $wrong }}">--}}
                                {{--<input type="hidden" name="skip" value="{{ $skip }}">--}}
                                {{--<input type="hidden" name="topic" value="{{$topic->id}}"/>--}}
                                {{--<input type="hidden" name="number" value="{{$question->number}}"/>--}}
                                {{--<input type="hidden" name="questionId" value="{{$question->id}}"/>--}}
                                {{--</div>--}}
                                {{--<p>Right: {{ session()->get('right') }}</p>--}}
                                {{--<p>Wrong: {{ session()->get('wrong') }}</p>--}}
                                {{--<p>Skip: {{ session()->get('skip') }}</p>--}}

                                <ul class='list-home option-container'>
                                    {{--<div>--}}
                                    @php
                                        $collection =  $question->options->shuffle()
                                    @endphp
                                    {{--<form method="POST" enctype="multipart/form-data">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('post') }}--}}
                                    @foreach( $collection as $i => $option)
                                        {{--<li>{{ $error }}</li>--}}

                                        <li class="option" id="{{$option->id}}"
                                            value="{{$option->id}}"
                                            onclick="getResult('{{$option}}' , '{{$collection}}' )"

                                        >
                                            {{$option->text}}
                                        </li>


                                        {{--<input type="hidden"--}}
                                        {{--name="choice"--}}
                                        {{--value="{{$i}}"--}}
                                        {{--id="{{$i}}"--}}
                                        {{--required/>--}}
                                        {{--<input type="hidden"--}}
                                        {{--name="question"--}}
                                        {{--value="{{$question->id}}"--}}
                                        {{--required/>--}}

                                        {{--<input type="radio"--}}
                                        {{--name="option"--}}
                                        {{--id="{{$i}}"--}}
                                        {{--id="{{ $option-> id }}"--}}
                                        {{--value="{{ $option-> id }}"--}}
                                        {{--onclick="getResult('{{$option}}' , '{{$collection}}' )"--}}

                                        {{--/>--}}

                                        {{--<button type="submit" id="ajax-submit">--}}
                                        {{--<label for="{{$i}}"--}}
                                        {{--class="radio-label text-capitalize">{{ $option->text }}</label>--}}
                                        {{--</button>--}}

                                    @endforeach

                                    {{--</form>--}}
                                    {{--<input type="submit"--}}
                                    {{--name="option"--}}
                                    {{--class="answer-submit"--}}
                                    {{--id="ajax-submit"--}}
                                    {{--value="{{ $option-> text }}"--}}
                                    {{--onclick="getResult('{{$option}}' , '{{$collection}}' )"--}}
                                    {{--/>--}}
                                    {{--<input type="text" hidden--}}
                                    {{--name="option1"--}}
                                    {{--id="option1"--}}
                                    {{--value="{{ $option-> id }}"--}}
                                    {{--/>--}}
                                    {{--<input type="radio"--}}
                                    {{--name="option"--}}
                                    {{--id="{{$i}}"--}}
                                    {{--id="ajax-submit"--}}
                                    {{--value="{{ $option-> id }}"--}}
                                    {{--onclick="getResult('{{$option}}' , '{{$collection}}' )"--}}
                                    {{--/>--}}

                                    {{--<input type="submit"--}}
                                    {{--id="ajax-submit"--}}
                                    {{--id="option1"--}}
                                    {{--name="option1"--}}
                                    {{--value="{{ $option-> id }}"--}}
                                    {{-->--}}

                                    {{--<label for="{{$i}}"--}}
                                    {{--class="radio-label text-capitalize">{{ $option->text }}</label>--}}

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
                                    {{--@endforeach--}}
                                    {{--</div>--}}
                                </ul>

                            </div>
                        </div>
                    </div>


                    {{--<div class="col-md-10 center">--}}
                    {{--<div class="dflex-center">--}}
                    {{--<div class="col-home  quiz-box">--}}
                    {{--<div class="heading" style="text-align: center">{{ $topic->title }}</div>--}}
                    {{--<div class="content">--}}
                    {{--@dd($topic)--}}
                    {{--<div class="question-number" style="font-weight: 700"></div>--}}
                    {{--<div class="question-text"></div>--}}
                    {{--</div>--}}


                    {{--<div class="option-container">--}}

                    {{--</div>--}}


                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-12 text-center">--}}
                    {{--<div style="display: flex; flex-direction: row; justify-content: center " class="text-center">--}}
                    {{--<div class="skip-question-btn">--}}
                    {{--<button type="button" onclick="skip()"--}}
                    {{--class="slideshow-slide-caption-subtitle -load o-hsub -link"--}}
                    {{--style="background-color: red !important; border-color: red !important; text-transform: uppercase;"--}}
                    {{-->Skip--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--&nbsp;&nbsp;&nbsp;--}}
                    {{--<div class="next-question-btn">--}}
                    {{--<button type="button" onclick="next()"--}}
                    {{--class="slideshow-slide-caption-subtitle -load o-hsub -link"--}}
                    {{--style="background-color: red !important; border-color: red !important; text-transform: uppercase;"--}}
                    {{-->Next--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    <div class="col-md-12 text-center">
                        <div style="display: flex; flex-direction: row; justify-content: center " class="text-center">

                            <button type="submit" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                    formaction="{{ action('MainController@skipQuestion') }}"
                                    name="skip" value="skip" id="skip-button"
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

                <div class="col-12">
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

    {{--<script type="text/javascript">--}}
    {{--console.log(<?= json_encode($topic); ?>);--}}
    {{--const quiz = <?= $topic->questions; ?>;--}}

    {{--var x = "<?php echo "$topic"?>";--}}
    {{--// console.log(x);--}}

    {{--const questionNumber = document.querySelector(".question-number");--}}
    {{--const questionText = document.querySelector(".question-text");--}}
    {{--const optionContainer = document.querySelector(".option-container");--}}

    {{--let questionCounter = 0;--}}
    {{--let currentQuestion;--}}
    {{--let availableQuestions = [];--}}
    {{--let availableOptions = [];--}}
    {{--let correctAnswers = 0;--}}
    {{--let attempt = 0;--}}
    {{--let skipQuestions = 0;--}}

    {{--//push the questions into availableQuestions Array--}}
    {{--function setAvailableQuestions() {--}}

    {{--// console.log('setAvailableQuestions');--}}
    {{--const totalQuestions = quiz.length;--}}

    {{--for (let i = 0; i < totalQuestions; i++) {--}}
    {{--availableQuestions.push(quiz[i]);--}}
    {{--}--}}
    {{--}--}}

    {{--// set question number and question and options--}}
    {{--function getNewQuestion() {--}}

    {{--// set question number--}}
    {{--questionNumber.innerHTML = "Question " + (questionCounter + 1) + " of " + quiz.length;--}}

    {{--// set question text--}}
    {{--//get random question--}}
    {{--const questionIndex = availableQuestions[Math.floor(Math.random() * availableQuestions.length)];--}}
    {{--currentQuestion = questionIndex;--}}
    {{--questionText.innerHTML = currentQuestion.text;--}}
    {{--//get the position of 'questionIndex' from the availableQuestions Array;--}}
    {{--const index1 = availableQuestions.indexOf(questionIndex);--}}
    {{--//remove the 'questionIndex' from the availableQuestions array, so that it not repeat--}}
    {{--availableQuestions.splice(index1, 1);--}}

    {{--// console.log(questionIndex);--}}
    {{--// console.log(availableQuestions);--}}


    {{--//set options--}}
    {{--//get options--}}
    {{--const optionLen = currentQuestion.options.length;--}}

    {{--//push option into availableOptions array--}}
    {{--for (let i = 0; i < optionLen; i++) {--}}
    {{--availableOptions.push(currentQuestion.options[i]);--}}
    {{--}--}}
    {{--// console.log(availableOptions);--}}

    {{--optionContainer.innerHTML = '';--}}
    {{--//create options in html--}}
    {{--for (let i = 0; i < optionLen; i++) {--}}
    {{--//random options--}}
    {{--const optionIndex = availableOptions[Math.floor(Math.random() * availableOptions.length)];--}}
    {{--//get the position of 'optionIndex' from the availableOptions array--}}
    {{--// console.log(optionIndex.id);--}}
    {{--const index2 = availableOptions.indexOf(optionIndex);--}}

    {{--// console.log(index2);--}}
    {{--//remove the 'optionIndex from the availableOption, so that option does not repeat--}}
    {{--availableOptions.splice(index2, 1);--}}
    {{--// console.log(optionIndex);--}}

    {{--const option = document.createElement("div");--}}
    {{--option.innerHTML = currentQuestion.options[i].text;--}}
    {{--option.id = currentQuestion.options[i].id;--}}
    {{--option.className = "option";--}}
    {{--optionContainer.appendChild(option);--}}
    {{--option.setAttribute("onclick", "checkResult(this)");--}}

    {{--}--}}

    {{--questionCounter++;--}}
    {{--}--}}

    {{--//get the result of current attempt question--}}
    {{--function checkResult(optionElement) {--}}
    {{--// console.log(optionElement);--}}
    {{--const id = parseInt(optionElement.id);--}}
    {{--var correct_id;--}}

    {{--const optionLen = currentQuestion.options.length;--}}
    {{--for (let i = 0; i < optionLen; i++) {--}}

    {{--if (currentQuestion.options[i].is_correct === 1) {--}}
    {{--correct_id = currentQuestion.options[i].id;--}}
    {{--}--}}

    {{--}--}}
    {{--// console.log(correct_id);--}}
    {{--if (id === correct_id) {--}}
    {{--// set green color--}}
    {{--optionElement.classList.add("correct");--}}
    {{--// console.log("Answer is correct");--}}
    {{--correctAnswers++;--}}

    {{--console.log("Correct: " + correctAnswers);--}}

    {{--} else {--}}
    {{--//set red color--}}
    {{--optionElement.classList.add("wrong");--}}
    {{--// console.log("Answer is wrong");--}}

    {{--//show the correct option--}}
    {{--const optionLen = optionContainer.children.length;--}}
    {{--for (let i = 0; i < optionLen; i++) {--}}
    {{--if (parseInt(optionContainer.children[i].id) === correct_id) {--}}
    {{--optionContainer.children[i].classList.add("correct");--}}
    {{--}--}}
    {{--}--}}
    {{--}--}}
    {{--attempt++;--}}
    {{--unClickableOptions();--}}
    {{--}--}}

    {{--//make all options unClickable once the user select one option--}}
    {{--function unClickableOptions() {--}}
    {{--const optionLen = optionContainer.children.length;--}}
    {{--for (let i = 0; i < optionLen; i++) {--}}
    {{--optionContainer.children[i].classList.add("already-answered");--}}
    {{--}--}}
    {{--}--}}

    {{--function skip() {--}}
    {{--if (questionCounter === quiz.length) {--}}
    {{--console.log("quiz over");--}}
    {{--quizResult();--}}
    {{--} else {--}}
    {{--skipQuestions++;--}}
    {{--getNewQuestion();--}}
    {{--}--}}
    {{--}--}}

    {{--function next() {--}}
    {{--if (questionCounter === quiz.length) {--}}
    {{--console.log("quiz over");--}}
    {{--quizResult();--}}
    {{--} else {--}}
    {{--getNewQuestion();--}}
    {{--}--}}
    {{--}--}}

    {{--function quizResult() {--}}


    {{--console.log("we here;");--}}

    {{--var ss = <?= session()->get('learning')['topic']; ?>;--}}
    {{--var rr = <?= session()->get('right'); ?>;--}}

    {{--//     console.log(ss);--}}
    {{--// console.log('Right: ' + rr);--}}


    {{--}--}}

    {{--window.onload = function () {--}}
    {{--//first set all questions in availableQuestions Array--}}
    {{--// setAvailableQuestions();--}}
    {{--//second: we cll getNextQuestion(); function--}}
    {{--// getNewQuestion();--}}
    {{--};--}}

    {{--</script>--}}
    {{----}}
    {{----}}
    {{----}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            // console.log('ajax working');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });

        });

        function getResult($option, $array) {
            // e.preventDefault();
            console.log('function');

            // console.log($option);
            // console.log($array);

            var option = JSON.parse($option);
            // console.log("Click option: " + option.id + " : " + option.text);

            var options = JSON.parse($array);


            var result = options.filter(function (item) {
                return item.is_correct === 1
            });


            // console.log("===>");
            //
            // console.log("Right option : " + result[0].id + " : " + result[0].text);
            //
            // console.log("===>");


            if (option.id == result[0].id) {
                console.log('Correct answer');
                document.getElementById(option.id).classList.add("correct");
            } else {
                console.log('Wrong answer');
                document.getElementById(option.id).classList.add("wrong");
                document.getElementById(result[0].id).classList.add("correct");

            }


            for (var i = 0; i < options.length; i++) {

                document.getElementById(options[i].id).classList.add("already-answered");

            }
            const optionContainer = document.querySelector(".option-container");
            console.log('we here');
            $.ajax({
                url: "{{url('/submitAnswer')}}",
                method: 'POST',
                data: {option: option.id},
                success: function (result) {
                    console.log(result.result.id);
                    // alert('hello');
                    const option = document.createElement("input");
                    option.setAttribute("type", "text");
                    option.setAttribute("value", result.result.id);
                    option.setAttribute("name", "option");
                    option.setAttribute("hidden", "hidden");
                    option.setAttribute("required", "required");
                    optionContainer.appendChild(option);
                    document.getElementById("skip-button").disabled = true;
                },
                error: function (xhr, ajaxOptions, thrownError) {}
            });
            //         e.preventDefault();
            //     });
            // });

        }


    </script>

@endsection