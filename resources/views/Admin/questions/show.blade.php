@extends('Admin.layouts.app')
@section('title','View Questions')

@section('admin-content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-title m-t-0  m-b-20" style="display: flex; justify-content: space-between">
                            <h4>Question {{ $question -> number }} of Topic
                                "{{ $question -> topic -> title }}"</h4>

                            <a href="{{ route('questions.index') }}"
                               class="btn btn-primary waves-effect m-l-5">
                                Back to Questions table
                            </a>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <b>Question ID : </b>{{$question -> id}}
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <p class="lead">
                            <b>Question Text :</b>
                            {{$question -> text}}
                        </p>
                    </div>
                </div>


                {{--{{ $question -> topic_id }}--}}
                {{--{{ $question -> created_at }}--}}
                Options:
                <ul>
                    @foreach($options as $index => $option)
                        <br>

                        <li>{{ $option -> text }}
                            @if($option -> is_correct == true)
                                <span class="badge badge-custom" >correct</span>

                            @endif
                        </li>

                    @endforeach
                </ul>

            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')


        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>

@endsection


@section('admin-modal')

@endsection

