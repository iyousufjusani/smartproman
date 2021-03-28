@extends('Admin.layouts.app')

@section('title','View Videos')

@section('admin-content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">VIDEOS</h4>
                    </div>
                    <div class="col-sm-12 text-center">
                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>

                    </div>
                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Videos Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Video Title</th>
                                    <th class="text-center">Video Link</th>
                                    <th class="text-center">Topic ID</th>
                                    <th class="text-center">Created Date</th>
                                    <!--                                    <th class="text-center">Edit</th>-->
                                    <th class="text-center">Action</th>


                                    <!--                                    <th class="text-center">REMOVE</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td class="text-center">{{ $video -> id }}</td>
                                        <td class="text-center">{{ $video -> title }}</td>
                                        <td class="text-center">{{ $video -> link }}</td>
                                        <td class="text-center">{{ $video -> topic_id }}</td>
                                        <td class="text-center">{{ $video -> created_at  }}</td>
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button>Edit</button>-->
                                        <!--                                        </td>-->
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <form action="scripts/videos-scripts.php?update=--><?php //echo $row['videoID']; ?><!--"-->
                                        <!--                                                  method="post" enctype="multipart/form-data">-->
                                        <!--                                                <button type="submit" class="btn btn-success btn-rounded"-->
                                        <!--                                                        name="btn-update">Update-->
                                        <!--                                                </button>-->
                                        <!--                                            </form>-->
                                        <!--                                        </td>-->
                                        <td class="text-center">
                                            <form action="scripts/videos-scripts.php?del={{ $video -> id }}"
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


                <div class="row">

                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary btn-rounded btn-lg m-b-30 " data-toggle="modal"
                                data-target="#add-admin">Add Video
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
    <div id="add-admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-contactLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add-contactLabel">Add Video</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="cname">Video Title</label>
                            <input type="text" class="form-control" id="cname" placeholder="Enter Video Title"
                                   name="vName"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="cname">Video Youtube Embed Link</label>
                            <input type="text" class="form-control" id="cname" placeholder="Enter Video Link"
                                   name="vLink"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="topic">Topic it belongs</label>

                            <select class="form-control" id="topic" name="topic_fk" required>
                                <option selected disabled>Select topic</option>
                                @foreach($topics as $topic)
                                    <option name="topic_id"
                                            value="{{ $topic -> id }}">{{ $topic -> title }}</option>
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

