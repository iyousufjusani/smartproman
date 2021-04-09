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
                    @include('Admin.includes.message')

                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Questions Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Question#</th>
                                    <th class="text-center">Question Test</th>
                                    <th class="text-center">Topic ID</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center" colspan="3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td class="text-center">{{ $question -> id }}</td>
                                        <td class="text-center">{{ $question -> number }}</td>
                                        <td class="text-justify">{{ $question -> text }}</td>
                                        <td class="text-center">{{ $question -> topic_id }}</td>
                                        <td class="text-center">{{ $question -> created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('questions.show', $question -> id) }}"
                                               class="btn btn-primary btn-rounded"
                                               name="btn-custom">View
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('questions.edit', $question -> id) }}"
                                               class="btn btn-custom btn-rounded"
                                               name="btn-update">Edit
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('questions.destroy', $question -> id) }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
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
                {{ $questions->links('pagination::bootstrap-4') }}

            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')


        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>

@endsection


@section('admin-modal')

@endsection

