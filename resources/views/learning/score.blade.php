@extends('layouts.index')
@section('header', 'bg-init bg')

@section('content')

    <style>

        .topic-button {
            border: 3px solid black;
            padding: 10px;
            border-radius: 5px;
            color: white;
            background-color: red;
            font-weight: 600;
            width: 150px;
            text-align: center;
        }

        .topic-button:hover {
            background-color: #c90000;

        }

        .table-heading {
            text-align: center;
            font-size: 3rem;
            font-weight: 700;


        }

        .table-content {
            font-size: 2rem;
            margin: 10px
        }

        @media only screen and (max-width: 750px) {
            .table-heading {
                font-weight: 700;
                font-size: 1.5rem;
            }

            .table-content {
                font-size: 1rem;
                margin: 2px;
            }
        }

    </style>
    {{--@dd($topic)--}}
    <br><br>

    <br>
    <section aria-label="section" class='container text-center' style="display: flex ; justify-content: center">
        <div class='row'>
            <form method="get" action="" >

                <div class="col-md-12">

                    <div class=''>
                        <div class='col-home'>
                            <div class='heading table-heading '>{{ $topic->title }}</div>
                            <h1>Score Board</h1>
                            <table class="table-content" border="5">
                                <thead>
                                <tr>
                                    <!--                                        <th>Attempt Questions</th>-->
                                    <th>Right Answers</th>
                                    <th>Wrong Answers</th>
                                    <th>Skipped Questions</th>
                                    <th>Total Questions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <!--                                        <td>--><?php //echo $attempted_questions = $total_questions - ($right_answers); ?><!--</td>-->
                                    <td>{{ $right }}</td>
                                    <td>{{ $wrong }}</td>
                                    <td>{{ $skip }}</td>
                                    <td>{{ $topic->questions->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div hidden>
                    <input type="hidden" name="right" value="{{ $right }}" />
                    <input type="hidden" name="wrong" value="{{ $wrong }}" />
                    <input type="hidden" name="skip" value="{{ $skip }}" />
                    <input type="hidden" name="topic" value="{{ $topic->id }}">
                    <input type="hidden" name="number" value="{{'number'}}">
                </div>

                <div class="col-md-12">
                    <div class="button-centr">
                        <br>
                        <button type="button" class="slideshow-slide-caption-subtitle -load o-hsub -link"
                                name="button" value="nextTopic"
                                style="background-color: red !important; border-color: red !important; text-transform: uppercase;">
                            <span class="shine"></span>
                            <span class="slideshow-slide-caption-subtitle-label">{{ __('Next Topic') }}</span>
                        </button>

                        {{--<button class="topic-button" name="next-topic">--}}
                            {{--Next Topic--}}
                        {{--</button>--}}

                    </div>
                </div>
            </form>

        </div>


    </section>

@endsection



@section('script')


@endsection