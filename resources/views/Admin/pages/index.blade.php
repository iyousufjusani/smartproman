@extends('Admin.layouts.app')
@section('title','View Page Images')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-12">
                        <div class="header-title m-t-0 m-b-20" style="display: flex; justify-content: space-between">
                            <h4 class="">Page Images Table</h4>
                            <div class="text-right">
                                <button class="btn btn-primary btn-rounded btn-lg m-b-30" data-toggle="modal"
                                        data-target="#add-page">Add Page Image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @include('Admin.includes.message')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-20">

                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Topic ID</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center" >Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td class="text-center">{{ $page -> id }}</td>
                                        <td class="text-center">{{ $page -> title }}</td>
                                        <td class="text-center"><img width="200"
                                                                     src="{{ url("uploads/" , $page -> image)}}"
                                                                     alt="topic-page-img"></td>
                                        <td class="text-center">{{ $page -> topic_id }}</td>
                                        <td class="text-center">{{ $page -> created_at }}</td>

                                        {{--<td class="text-center">--}}
                                            {{--<button type="submit" class="btn btn-custom btn-rounded"--}}
                                                    {{--name="btn-update">Update--}}
                                            {{--</button>--}}
                                        {{--</td>--}}
                                        <td class="text-center">
                                            <form action="{{ route('pages.destroy', $page -> id) }}"
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

            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')

        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>

@endsection


@section('admin-modal')

    <!-- sample modal content -->
    <div id="add-page" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-contactLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add-contactLabel">Add Topic Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label for="title">Image Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Video Title"
                                   name="title" value="{{ old('title') }}"
                                   required>
                        </div>


                        <div class="form-group">
                            <label for="image">Topic Image</label>

                            <input id="image" type="file" style="padding: 3px"
                                   class="form-control" name="image" required value="{{ old('image') }}">
                        </div>

                        <div class="form-group">
                            <label for="topic">Topic it belongs</label>

                            <select class="form-control" id="topic" name="topic_id" required>
                                <option selected hidden value="1">Select topic</option>
                                @foreach($topics as $topic)
                                    <option value="{{ $topic->id }}"
                                            {{ old('topic_id') == $topic->id ? 'selected' : ''}}>
                                        {{$topic->title }}
                                    </option>

                                @endforeach
                            </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary " name="btn-add" value="Add">
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection