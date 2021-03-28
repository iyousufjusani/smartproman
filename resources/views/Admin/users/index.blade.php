@extends('Admin.layouts.app')
@section('title','View Users')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12" >
                        <div class="header-title m-t-0 m-b-20" style="display: flex; justify-content: space-between">
                            <h4 class="">Users Table</h4>
                            <div class="text-right">
                                <button class="btn btn-primary btn-rounded btn-lg m-b-30" data-toggle="modal"
                                        data-target="#add-user">Add User
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
                                    <th class="text-center">#</th>
                                    <!--                                    <th class="text-center">ID</th>-->
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Created At</th>

                                    <th class="text-center" colspan="2">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <!--                                        <th scope="row" class="text-center">-->
                                    <?php //echo $row['customer_sno']?><!--</th>-->
                                        <td class="text-center">{{ $index + 1  }}</td>
                                        <td class="text-center"><img width="60"
                                                                     src="{{ url("uploads/users/" , $user -> image)}}"
                                                                     alt="type-img"></td>
                                        <td class="text-center">{{ $user -> name }}</td>
                                        <td class="text-center">{{ $user -> email }}</td>
                                        <td class="text-center">{{ $user -> created_at }}</td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-custom btn-rounded">Update</button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-rounded">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $users->links('pagination::bootstrap-4') }}


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
    <div id="add-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-contactLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add-contactLabel">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label for="name">User Full Name<span
                                        class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter full name" name="name"
                                   value="{{ old('name') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="email">User Email Address<span
                                        class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email Password"
                                   name="email" value="{{ old('email') }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="password">User Password<span
                                        class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" placeholder="Enter User Password"
                                   name="password" value="{{ old('password') }}"
                                   required>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary " name="btn-add-user" value="Add">
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

