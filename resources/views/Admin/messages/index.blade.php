@extends('Admin.layouts.app')
@section('title','View Message')

@section('admin-content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="header-title m-t-0 m-b-20" style="display: flex; justify-content: space-between">
                            <h4 class="">Message Table</h4>
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Message</th>
                                    <th class="text-center">Created At</th>

                                    <th class="text-center" colspan="2">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <!--                                        <th scope="row" class="text-center">-->
                                    <?php //echo $row['customer_sno']?><!--</th>-->
                                        <td class="text-center">{{ $message -> id }}</td>
                                        <td class="text-center">{{ $message -> name }}</td>
                                        <td class="text-center">{{ $message -> email }}</td>
                                        <td class="text-justify">{{ $message -> message }}</td>
                                        <td class="text-center">{{ $message -> created_at }}</td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-custom btn-rounded">View</button>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('messages.destroy', $message -> id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $messages->links('pagination::bootstrap-4') }}


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

