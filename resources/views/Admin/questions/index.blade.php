@extends('Admin.layouts.app')
@section('title','View Questions')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Questions</h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Questions Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Question#</th>
                                    <th class="text-center">Question Test</th>
                                    <!--                                    <th class="text-center">Price</th>-->
                                    <th class="text-center">TopicID</th>
                                    <!--                                    <th class="text-center"></th>-->
                                    <th class="text-center">EDIT</th>
                                    <th class="text-center">REMOVE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td class="text-center">{{ $question -> id }}</td>
                                        <td class="text-center">{{ $question -> number }}</td>
                                        <td>{{ $question -> text }}</td>
                                        <td class="text-center">{{ $question -> topic_id }}</td>
                                        <td class="text-center">

                                            <form action="pages-update-question.php?update={{ $question -> id }}"
                                                  method="post" enctype="multipart/form-data">
                                                <button type="submit" class="btn btn-custom btn-rounded"
                                                        name="btn-update">Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="scripts/questions-scripts.php?delete={{ $question -> id }}"
                                                  method="post" enctype="multipart/form-data">
                                                <button type="submit" class="btn btn-danger btn-rounded"
                                                        name="btn-delete">Delete
                                                </button>
                                            </form>
                                        </td>
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

