@extends('Admin.layouts.app')
@section('title','View Options')

@section('admin-content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Options</h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Options Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Option Text</th>
                                    <th class="text-center">Correct</th>
                                    <th class="text-center">QuestionID</th>
                                    <th class="text-center">Created At</th>
                                    <!--                                    <th class="text-center">EDIT</th>-->
                                    <!--                                    <th class="text-center">REMOVE</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($options as $option)
                                    <tr style="text-align: center">
                                        <td class="text-center">{{$option -> id}}</td>
                                        <td>{{$option -> text}}</td>
                                        <td>@if($option -> is_correct == true)
                                                {{ 'Right' }}
                                            @else
                                                {{ 'Wrong' }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $option -> question_id }}</td>
                                        <td class="text-center">{{ $option -> created_at }}</td>

                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button type="button" class="btn btn-dark btn-rounded">Inspect</button>-->
                                        <!--                                        </td>-->
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button>Update</button>-->
                                        <!---->
                                        <!--                                            <form action="pages-update-topics.php?update=--><?php //echo $row['questionID']; ?><!--"-->
                                        <!--                                                  method="post" enctype="multipart/form-data">-->
                                        <!--                                                <button type="submit" class="btn btn-custom btn-rounded"-->
                                        <!--                                                        name="btn-update">Update-->
                                        <!--                                                </button>-->
                                        <!--                                            </form>-->
                                        <!--                                        </td>-->
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button>Delete</button>-->
                                        <!--                                            <form action="scripts/questions-scripts.php?delete=--><?php //echo $row['questionID']; ?><!--"-->
                                        <!--                                                  method="post" enctype="multipart/form-data">-->
                                        <!--                                                <button type="submit" class="btn btn-danger btn-rounded"-->
                                        <!--                                                        name="btn-delete">Delete-->
                                        <!--                                                </button>-->
                                        <!--                                            </form>-->
                                        <!--                                        </td>-->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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