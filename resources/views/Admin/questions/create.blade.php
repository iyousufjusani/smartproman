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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="p-20 m-b-20">
                                <h4 class="header-title m-t-0">ADD QUESTIONS</h4>
                                <p class="text-muted font-13 m-b-10">

                                </p>

                                <div class="m-b-20 ">
                                    <form role="form" method="post" action="{{ route('questions.store') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}

                                        <div class="form-group row">
                                            <label for="question-name" class="col-sm-10 form-control-label">Question
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter Question Text" name="question_text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="question-name" class="col-sm-4 form-control-label">Option 1
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter option 1 text here" name="choice1"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="question-name" class="col-sm-4 form-control-label">Option 2
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter option 2 text here " name="choice2"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="question-name" class="col-sm-4 form-control-label">Option 3
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter option 3 text here" name="choice3"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="question-name" class="col-sm-4 form-control-label">Option 4
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter option 4 text here" name="choice4"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="question-price" class="col-sm-12 form-control-label">Correct
                                                Option
                                                <span class="text-danger">*</span></label>
                                            <div class="col-sm-12">
                                                <input type="text" required class="form-control"
                                                       placeholder="Enter correct option here" name="correct_option"/>
                                            </div>
                                        </div>
                                        <!---->
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-price" class="col-sm-4 form-control-label">Correct-->
                                        <!--                                                Option Number-->
                                        <!--                                                <span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-8">-->
                                        <!--                                                <input type="number" min="1" max="4"-->
                                        <!--                                                       placeholder="Correct option number ( For example: 2 )" required-->
                                        <!--                                                       class="form-control" name="correct_choice">-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->

                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-stock" class="col-sm-4 form-control-label">question-->
                                        <!--                                                Stock<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input type="number" required class="form-control" step="any" min="0"-->
                                        <!--                                                       id="question-stock" placeholder="Enter stock availability"-->
                                        <!--                                                       name="stock">-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->

                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-image" class="col-sm-4 form-control-label">question-->
                                        <!--                                                main-->
                                        <!--                                                image<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input id="question-image" type="file" style="padding: 3px"-->
                                        <!--                                                       class="form-control" required name="image">-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-image1" class="col-sm-4 form-control-label">question-->
                                        <!--                                                image1<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input id="question-image1" type="file" style="padding: 3px"-->
                                        <!--                                                       class="form-control" name="image1" required>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-image2" class="col-sm-4 form-control-label">question-->
                                        <!--                                                image2<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input id="question-image2" type="file" style="padding: 3px"-->
                                        <!--                                                       class="form-control" name="image2" required>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-image3" class="col-sm-4 form-control-label">question-->
                                        <!--                                                image3<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input id="question-image3" type="file" style="padding: 3px"-->
                                        <!--                                                       class="form-control" name="image3" required>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                        <div class="form-group row">-->
                                        <!--                                            <label for="question-image4" class="col-sm-4 form-control-label">question-->
                                        <!--                                                image4<span class="text-danger">*</span></label>-->
                                        <!--                                            <div class="col-sm-7">-->
                                        <!--                                                <input id="question-image4" type="file" style="padding: 3px"-->
                                        <!--                                                       class="form-control" name="image4" required>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->

                                        <div class="form-group">
                                            <label for="topic">Topic it belongs<span
                                                        class="text-danger">*</span></label>

                                            <select class="form-control" id="topic" name="topic_fk" required>
                                                <option selected hidden value="1">Select topic</option>

                                                @foreach($topics as $topic)
                                                    <option value="{{ $topic->id }}"
                                                            {{ old('topic_id') == $topic->id ? 'selected' : ''}}>
                                                        {{$topic->title }}
                                                    </option>

                                                @endforeach
                                            </select>

                                        </div>


                                        <br>

                                        <div class="form-group row">
                                            <div class="col-sm-8 offset-sm-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light"
                                                        name="btn-add">
                                                    ADD
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-default waves-effect m-l-5">
                                                    Clear
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>

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

