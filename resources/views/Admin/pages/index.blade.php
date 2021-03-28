@extends('Admin.layouts.app')
@section('title','View Page Images')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">PAGE IMAGES</h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Page Images Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Topic ID</th>
                                    <th class="text-center">Created At</th>
                                    <!--                                    <th class="text-center">EDIT</th>-->
                                    <!--                                    <th class="text-center">REMOVE</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td class="text-center">{{ $page -> id }}</td>
                                        <td class="text-center">{{ $page -> title }}</td>
                                        <td class="text-center"><img width="200"
                                                                     src="../images/{{ $page -> image }}"
                                                                     alt=""></td>
                                        <td class="text-center">{{ $page -> topic_id }}</td>
                                        <td class="text-center">{{ $page -> created_at }}</td>
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button>Edit</button>-->
                                        <!--                                        </td>-->
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <button>Delete</button>-->
                                        <!--                                        </td>-->

                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <form action="scripts/subcategory-scripts.php?update=-->
                                    <?php //echo $row['subcategory_name']; ?><!--"-->
                                        <!--                                                  method="post" enctype="multipart/form-data">-->
                                        <!--                                                <button type="submit" class="btn btn-custom btn-rounded"-->
                                        <!--                                                        name="btn-update">Update-->
                                        <!--                                                </button>-->
                                        <!--                                            </form>-->
                                        <!--                                        </td>-->
                                        <!--                                        <td class="text-center">-->
                                        <!--                                            <form action="scripts/subcategory-scripts.php?delete=-->
                                    <?php //echo $row['subcategory_name']; ?><!--"-->
                                        <!--                                                  method="post" enctype="multipart/form-data">-->
                                        <!--                                                <button type="submit" class="btn btn-danger btn-rounded"-->
                                        <!--                                                        name="btn-delete">Delete-->
                                        <!--                                                </button>-->
                                        <!--                                            </form>-->
                                        <!--                                        </td>-->
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