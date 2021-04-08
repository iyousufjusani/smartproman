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
                @include('Admin.includes.message')


                <div class="row">
                    @foreach($admins as $admin)
                        <div class="col-md-4">
                            <div class="text-center card-box">
                                <div class="member-card mt-4">
                                    <span class="user-badge @if($admin -> is_super == 1) {{'bg-info'}} @else {{'bg-warning'}}@endif ">
                                        @if($admin -> is_super == 1)
                                            {{'Super Admin'}}
                                        @else
                                            {{'Admin'}}
                                        @endif
                                    </span>

                                    <div class="thumb-xl member-thumb m-b-10 center-page">
                                        <img src="{{ url("uploads/user_images/" , $admin -> image)}}"
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


                                    {{--@if($admin -> is_super == 1)--}}


                                    <form action="{{ route('admins.destroy', $admin -> id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}

                                        <button type="button"
                                                data-toggle="modal"
                                                data-target="#edit-admin{{$admin -> id}}"
                                                class="btn btn-info btn-sm m-t-10">Edit
                                        </button>


                                        <button type="submit" class="btn btn-danger btn-sm m-t-10">Delete
                                        </button>

                                    </form>

                                    {{--@endif--}}


                                </div>

                            </div>

                        </div>
                        <!-- end col -->



                        <!-- Edit modal content -->
                        <div id="edit-admin{{$admin -> id}}" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="add-contactLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="add-contactLabel">Edit Admin</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="post"
                                              action="{{ route('admins.update', $admin->id) }}"
                                              enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <div class="form-group">
                                                <label for="name">Update Admin Full Name<span
                                                            class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name"
                                                       value="{{ $admin->name }}" name="name"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Update Admin Email Address<span
                                                            class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email"
                                                       name="email" value="{{ $admin->email }}"
                                                       required>
                                            </div>


                                            <div class="form-group">
                                                <label for="password">Update Admin Password<span
                                                            class="text-danger">*</span> (At least 8 Characters)</label>
                                                <input type="password" class="form-control" id="password"
                                                       placeholder="Change Admin password"
                                                       name="password" value="{{ $admin->password }}"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Admin New Image</label>
                                                <input type="file" id="image" name="image" class="form-control-file">
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
                    @endforeach
                </div>

                <!-- end row -->


                {{--@if($admin -> is_super == 1)--}}
                <div class="row">
                    <div class="col-sm-12 text-center">

                    </div>
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary btn-rounded btn-lg m-b-30 center-page" data-toggle="modal"
                                data-target="#add-admin">Add Admin
                        </button>
                    </div><!-- end col -->
                </div>
            {{--@endif--}}
            <!-- end row -->

            {{ $admins->links('pagination::bootstrap-4') }}

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
                            <form role="form" method="post" action="{{ route('admins.store') }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter first name"
                                           name="name"
                                           value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email"
                                           name="email" value="{{ old('email') }}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                           placeholder="Enter Password"
                                           name="password" value="{{ old('password') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control-file" required>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary " name="btn-add-admin" value="Add">
                                </div>

                            </form>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


@endsection
