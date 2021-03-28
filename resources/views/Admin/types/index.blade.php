@extends('Admin.layouts.app')
@section('title','View Types')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-title m-t-0 m-b-20" style="display: flex; justify-content: space-between">
                            <h4 class="">Topic Table</h4>
                            <div class="text-right">
                                <button class="btn btn-primary btn-rounded btn-lg m-b-30" data-toggle="modal"
                                        data-target="#add-type">Add Type
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-20">
                            <h5 class="font-14"><b>Type Table</b></h5>
                            <table class="table table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Created At</th>
                                    <!--                                    <th class="text-center">EDIT</th>-->
                                    <!--                                    <th class="text-center">REMOVE</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($types as $index => $type)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $type -> title}}</td>
                                        <td class="text-center"><img width="150"
                                                                     src="uploads/{{ $type -> image }}"
                                                                     alt="type-img"></td>
                                        <td class="text-center">{{ $type -> created_at }}</td>
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
                {{ $types->links('pagination::bootstrap-4') }}


            </div> <!-- container -->

            <!-- Down Bar Start -->

        @include('Admin.includes.downBar')


        <!-- Down Bar End -->

        </div> <!-- content -->

    </div>
@endsection


@section('admin-modal')
    <div id="add-type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-contactLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="add-contactLabel">Add Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ route('types.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label for="title">Type Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Type Title"
                                   name="title"
                                   required value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="image">Type Image</label>

                            <input id="image" type="file" style="padding: 3px"
                                   class="form-control" name="image" required>
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