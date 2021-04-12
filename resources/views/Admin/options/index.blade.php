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
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($options as $option)
                                    <tr style="text-align: center">
                                        <td class="text-center">{{$option -> id}}</td>
                                        <td>{{$option -> text}}</td>
                                        <td>
                                            @if($option -> is_correct == true)
                                                <span class="badge badge-custom">correct</span>
                                            @else
                                                <span class="badge badge-danger">incorrect</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $option -> question_id }}</td>
                                        <td class="text-center">{{ $option -> created_at }}</td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-rounded"
                                                    data-toggle="modal"
                                                    data-target="#edit-option{{$option -> id}}">Edit
                                            </button>
                                        </td>


                                        <!-- Edit modal content -->
                                        <div id="edit-option{{$option -> id}}" class="modal fade" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="add-contactLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="add-contactLabel">Edit Option</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" method="post"
                                                              action="{{ route('options.update', $option->id) }}"
                                                              enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            {{ method_field('put') }}

                                                            <div class="form-group">
                                                                <label for="text">Update Option Text<span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="text"
                                                                       value="{{ $option->text }}" name="text"
                                                                       required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="text">Question ID<span
                                                                            class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="text"
                                                                       value="{{ $option->question_id }}" name="text"
                                                                       required disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <input id="correct" type="checkbox"
                                                                           name="correct" value="1"/>
                                                                <label for="correct">Mark this option correct</label>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default "
                                                                        data-dismiss="modal">Cancel
                                                                </button>
                                                                <input type="submit" class="btn btn-primary "
                                                                       name="btn-add-user" value="Update">
                                                            </div>

                                                        </form>
                                                    </div>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <!-- /. end modal -->

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $options->links('pagination::bootstrap-4') }}

            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')


        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>


@endsection

@section('admin-modal')


@endsection