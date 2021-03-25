@extends('Admin.layouts.app')
@section('title','View Admins')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Admins</h4>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    @foreach($admins as $admin)
                    <div class="col-md-4">
                        <div class="text-center card-box">
                            <div class="member-card mt-4">
                                <span class="user-badge bg-warning">Admin</span>
                                <div class="thumb-xl member-thumb m-b-10 center-page">
                                    <img src="uploads/users/{{$admin -> image}}"
                                         class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                </div>

                                <div class="">
                                    <h5 class="m-b-5 mt-2">{{$admin -> name}}</h5>
                                    <!--                                        <p class="text-muted">@--><?php //echo $row['admin_role'] ?><!-- <span> | </span> <span> -->
                                    <a href="#"
                                       class="text-pink">{{ $admin -> email }}</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Dummy Text, has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <button type="button" class="btn btn-default btn-sm m-t-10">Message</button>
                                <!--                                    <button type="button" class="btn btn-default btn-sm m-t-10">View Profile</button>-->

                                <ul class="social-links list-inline m-t-30">
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                           href=""
                                           data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                           href=""
                                           data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                           href=""
                                           data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>
                    <!-- end col -->

                    @endforeach
                </div>
                <!-- end row -->



                <div class="row">
                    <div class="col-sm-12 text-center">

                    </div>
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary btn-rounded btn-lg m-b-30 center-page" data-toggle="modal"
                                data-target="#add-admin">Add Admin
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
                <h4 class="modal-title" id="add-contactLabel">Add Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="fname">Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname"
                               required>
                    </div>

                    <!--                    <div class="form-group">-->
                    <!--                        <label for="lname">Last Name</label>-->
                    <!--                        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname"-->
                    <!--                               required>-->
                    <!--                    </div>-->
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="username">Username</label>-->
                    <!--                        <input type="text" class="form-control" id="username" placeholder="Enter username"-->
                    <!--                               name="username" required>-->
                    <!--                    </div>-->

                    <div class="form-group">
                        <label for="inputEmai1">Email Address</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="email"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="Inputpassword">Password</label>
                        <input type="password" class="form-control" id="Inputpassword" placeholder="Enter Password"
                               name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="inputconfirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="inputconfirmpassword"
                               placeholder="Confirm Password" name="cpassword" required>
                    </div>
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="selectrole">Role</label>-->
                    <!--                        <select class="form-control" id="selectrole" name="role" data-placeholder="Select" required>-->
                    <!--                            <option value="">-----</option>-->
                    <!--                            <option value="Leader">Leader</option>-->
                    <!--                            <option value="Editor">Editor</option>-->
                    <!--                            <option value="Manager">Manager</option>-->
                    <!--                            <option value="Developer">Developer</option>-->
                    <!--                            <option value="Designer">Designer</option>-->
                    <!--                        </select>-->
                    <!--                    </div>-->
                    <div class="form-group">
                        <label for="inputimage">Image</label>
                        <input type="file" id="inputimage" name="image" class="form-control-file" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary " name="btn-add-admin" value="Add">
                    </div>

                    <?php
                    if (isset($_POST['btn-add-admin'])) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { ?>

                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>SUCCESS!</strong> Admin Successfully Added
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Oh snap!</strong> Admin Addition Failed
                    </div>


                    <?php }
                    }
                    ?>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
