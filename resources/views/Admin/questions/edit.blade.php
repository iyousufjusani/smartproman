@extends('Admin.layouts.app')
@section('title','Add Questions')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">QUESTIONS</h4>
                    </div>
                </div>

                @include('Admin.includes.message')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-20 m-b-20">
                            <div class="header-title m-t-0" style="display: flex; justify-content: space-between">
                                <h4 >EDIT QUESTIONS</h4>
                                <a href="{{ route('questions.index') }}"
                                   class="btn btn-primary waves-effect m-l-5">
                                    Back to Questions table
                                </a>
                            </div>
                            <br>
                            <div class="m-b-20 ">
                                <form role="form" method="post" action="{{ route('questions.update', $question -> id ) }}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}

                                    <div class="form-group row">
                                        <label for="text" class="col-sm-10 form-control-label">Question Text
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" id="text" required class="form-control"
                                                   placeholder="Enter Question Text" name="text" value="{{$question -> text}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="choice1" class="col-sm-4 form-control-label">Option 1
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="choice1" required class="form-control"
                                                   placeholder="Enter option 1 text here" name="choice1" value="{{$question -> text}}"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input id="choice_radio" type="radio" required
                                                   name="correct" value="1"/>
                                            <label for="choice_radio">Option 1 is Correct</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="choice2" class="col-sm-4 form-control-label">Option 2
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="choice2" required class="form-control"
                                                   placeholder="Enter option 2 text here " name="choice2" value="{{$question -> text}}"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input id="choice_radio" type="radio" required
                                                   name="correct" value="2"/>
                                            <label for="choice_radio">Option 2 is Correct</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="choice3" class="col-sm-4 form-control-label">Option 3
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="choice3" required class="form-control"
                                                   placeholder="Enter option 3 text here" name="choice3" value="{{$question -> text}}" />
                                        </div>
                                        <div class="col-sm-2">
                                            <input id="choice_radio" type="radio" required
                                                   name="correct" value="3"/>
                                            <label for="choice_radio">Option 3 is Correct</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="choice4" class="col-sm-4 form-control-label">Option 4
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" id="choice4" required class="form-control"
                                                   placeholder="Enter option 4 text here" name="choice4" value="{{$question -> text}}"/>
                                        </div>
                                        <div class="col-sm-2">
                                            <input id="choice_radio" type="radio" required
                                                   name="correct" value="4"/>
                                            <label for="choice_radio">Option 4 is Correct</label>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="topic_id">Topic it belongs<span
                                                    class="text-danger">*</span></label>
                                        <select class="form-control" id="topic_id" name="topic_id" required>
                                            @foreach($topics as $topic)
                                                <option value="{{ $topic->id }}"
                                                        {{ $question -> topic_id == $topic->id ? 'selected' : ''}}>
                                                    {{$topic->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <br>

                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4">
                                            <button type="reset"
                                                    class="btn btn-default waves-effect m-l-5">
                                                Clear Form
                                            </button>
                                            <button type="submit" class="btn btn-custom waves-effect waves-light"
                                                    name="btn-add">
                                                Add Question
                                            </button>

                                        </div>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')


        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>
@endsection


@section('admin-modal')

@endsection

