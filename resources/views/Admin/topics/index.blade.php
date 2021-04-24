@extends('Admin.layouts.app')
@section('title','View Topics')

@section('admin-content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">TOPICS</h4>
                    </div>

                </div>
                <!-- end row -->

                @include('Admin.includes.message')

                <div class="row">

                    @foreach ($topics as $topic)


                        <div class="col-md-4">
                            <div class="text-center card-box">
                                <div class="member-card mt-4">
                                    <span class="user-badge bg-warning">Topic</span>
                                    <div class="card center-page" >

                                        <img class="card-img-top"
                                             src="{{ url("uploads/topic_images/" , $topic -> image)}}"
                                             alt="Card image cap">
                                    </div>

                                    <div class="">
                                        <h4 class="m-b-5 mt-2 center-page text-uppercase">{{ $topic -> title }}</h4>

                                    </div>

                                    <p class="text-muted font-13 text-center text-capitalize" style="text-transform: capitalize">
                                        {{ $topic -> description }}
                                    </p>

                                    {{--@if($admin -> is_super == 1)--}}


                                    <form action="{{ route('topics.destroy', $topic -> id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}

                                        <button type="button"
                                                data-toggle="modal"
                                                data-target="#edit-topic{{$topic -> id}}"
                                                class="btn btn-info btn-sm m-t-10">Edit
                                        </button>

                                        <button type="submit" class="btn btn-danger btn-sm m-t-10">Delete
                                        </button>

                                    </form>

                                    {{--@endif--}}
                                </div>

                            </div>

                        </div>

                        <!-- edit modal content -->
                        <div id="edit-topic{{$topic -> id}}" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="add-contactLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="add-contactLabel">Add Topic</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post"
                                              action="{{ route('topics.update' , $topic->id ) }}"
                                              enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <div class="form-group">
                                                <label for="title">Topic Name<span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title"
                                                       name="title"
                                                       required value="{{ $topic->title }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Topic Description<span
                                                            class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" id="description"
                                                          name="description"
                                                          required>{{ $topic->description }}</textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="type_id">Topic Type</label>
                                                <select class="form-control" id="type_id" name="type_id" required>
                                                    <option selected hidden value="1">Select type</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}"
                                                                {{ $topic->type_id == $type->id ? 'selected' : ''}}>
                                                            {{$type->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label for="image">Topic New Image</label>
                                                <input id="image" type="file" style="padding: 3px"
                                                       class="form-control-file" name="image"/>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default " data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <input type="submit" class="btn btn-primary " name="btn-add-topic"
                                                       value="Update">
                                            </div>

                                        </form>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    @endforeach
                </div>
                <!-- end row -->
                {{ $topics->links('pagination::bootstrap-4') }}


                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary btn-rounded btn-lg m-b-30" data-toggle="modal"
                                data-target="#add-topic">Add Topic
                        </button>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- container -->


            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')

        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>

@endsection


@section('admin-modal')

    <!-- sample modal content -->
    <div id="add-topic" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-contactLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add-contactLabel">Add Topic</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ route('topics.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label for="title">Topic Name<span
                                        class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Topic Title"
                                   name="title"
                                   required value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Topic Description<span
                                        class="text-danger">*</span></label>
                            <textarea type="text" class="form-control" id="description"
                                      placeholder="Enter Topic Description"
                                      name="description"
                                      required>{{ old('description') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="image">Topic Image</label>

                            <input id="image" type="file" style="padding: 3px"
                                   class="form-control-file" name="image" value="{{ old('image') }}" required/>
                        </div>


                        <div class="form-group">
                            <label for="type_id">Topic Type</label>
                            <select class="form-control" id="type_id" name="type_id" required>
                                <option selected hidden value="1">Select type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                            {{ old('type_id') == $type->id ? 'selected' : ''}}>
                                        {{$type->title }}
                                    </option>
                                @endforeach
                            </select>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary " name="btn-add-topic" value="Add">
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


@endsection