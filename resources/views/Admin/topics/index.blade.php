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
                    <div class="col-sm-12 text-center">

                    </div>
                </div>
                <!-- end row -->


                <div class="row">


                    <div class="col-md-4">
                        <div class="text-center card-box">
                            <div class="member-card mt-4">
                                <span class="user-badge bg-warning">Topic</span>
                                <!--                                    <div class="thumb-xl member-thumb m-b-10 center-page">-->
                                <!--                                        <img src="../topics/--><?php //echo $row['topic_image'] ?><!--"-->
                                <!--                                             class="rounded-circle img-thumbnail"-->
                                <!--                                             alt="profile-image">-->
                                <!--                                    </div>-->

                                <div class="">
                                    <h4 class="m-b-5 mt-2 center-page">Topic Title</h4>
                                    <!--                                        <h6 class="text-muted">@-->
                                    <!--                                            --><?php //echo $row['topic_tagline'] ?>
                                <!--                                        </h6>-->
                                </div>

                                <!--                                    <p class="text-muted font-13">-->
                                <!--                                        Hi I'm Dummy Text, has been the industry's standard dummy text ever since the-->
                                <!--                                        1500s, when an unknown printer took a galley of type.-->
                                <!--                                    </p>-->

                                <!--                                    <button type="button" class="btn btn-default btn-sm m-t-10">Message</button>-->
                                <!--                                    <button type="button" class="btn btn-default btn-sm m-t-10">View Profile</button>-->
                                <!---->
                                <!--                                    <ul class="social-links list-inline m-t-30">-->
                                <!--                                        <li class="list-inline-item">-->
                                <!--                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"-->
                                <!--                                               href=""-->
                                <!--                                               data-original-title="Facebook"><i class="fa fa-facebook"></i></a>-->
                                <!--                                        </li>-->
                                <!--                                        <li class="list-inline-item">-->
                                <!--                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"-->
                                <!--                                               href=""-->
                                <!--                                               data-original-title="Twitter"><i class="fa fa-twitter"></i></a>-->
                                <!--                                        </li>-->
                                <!--                                                                            <li class="list-inline-item">-->
                                <!--                                                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"-->
                                <!--                                                                                   href=""-->
                                <!--                                                                                   data-original-title="Skype"><i class="fa fa-skype"></i></a>-->
                                <!--                                                                            </li>-->
                                <!--                                    </ul>-->

                            </div>

                        </div>

                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary btn-rounded btn-lg m-b-30" data-toggle="modal"
                                data-target="#add-admin">Add Topic
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
                <h4 class="modal-title" id="add-contactLabel">Add Topic</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Topic Name<span
                                    class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               required>
                    </div>

                    <!--                    <div class="form-group">-->
                    <!--                        <label for="inputimage">topic Logo Image<span-->
                    <!--                                    class="text-danger">*</span></label>-->
                    <!--                        <input type="file" id="inputimage" name="image" class="form-control-file" required>-->
                    <!--                    </div>-->
                    <!--                    -->
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="tagline">topic Tagline<span-->
                    <!--                                    class="text-danger">*</span></label>-->
                    <!--                        <input type="text" class="form-control" id="tagline" placeholder="Enter tagline" name="tagline"-->
                    <!--                               required>-->
                    <!--                    </div>-->


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary " name="btn-add-topic" value="Add">
                    </div>

                    <!--                    --><?php
                //                    if (isset($_POST['btn-add-topic'])) {
                //                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { ?>
                <!---->
                    <!--                            <div class="alert alert-success alert-dismissible fade in" role="alert">-->
                    <!--                                <button type="button" class="close" data-dismiss="alert"-->
                    <!--                                        aria-label="Close">-->
                    <!--                                    <span aria-hidden="true">&times;</span>-->
                    <!--                                </button>-->
                    <!--                                <strong>SUCCESS!</strong> topic Successfully Added-->
                    <!--                            </div>-->
                    <!--                        --><?php //} else { ?>
                <!--                            <div class="alert alert-danger alert-dismissible fade in" role="alert">-->
                    <!--                                <button type="button" class="close" data-dismiss="alert"-->
                    <!--                                        aria-label="Close">-->
                    <!--                                    <span aria-hidden="true">&times;</span>-->
                    <!--                                </button>-->
                    <!--                                <strong>Oh snap!</strong> topic Addition Failed-->
                    <!--                            </div>-->
                    <!---->
                    <!---->
                    <!--                        --><?php //}
                    //                    }
                    //                    ?>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection