@extends('Admin.layouts.app')

@section('title','Dashboard')

@section('admin-content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20 text-center">Welcome to Admin Panel</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box widget-inline">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">

                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-primary mdi mdi-account"></i>
                                            <b>{{$admins->count()}}</b>
                                        </h3>
                                        <p class="text-muted">Total Admins</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">

                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-warning mdi mdi-account-box"></i>
                                            <b>{{$users->count()}}</b></h3>
                                        <p class="text-muted">Total Users</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-6">

                                    <div class="widget-inline-box text-center">
                                        <h3 class="m-t-10"><i class="text-custom mdi mdi-table"></i>
                                            <b>{{ $topics->count() }}</b></h3>
                                        <p class="text-muted">Total Topics</p>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-6">
                                    <div class="widget-inline-box text-center b-0">

                                        <h3 class="m-t-10"><i class="text-danger mdi mdi-quicktime"></i>
                                            <b>{{ $questions->count() }}</b>
                                        </h3>
                                        <p class="text-muted">Total Questions</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--end row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h6 class="m-t-0">Admins</h6>
                            <div class="table-responsive">

                                <!-- table starts -->

                                <table class="table table-hover mails m-0 table table-actions-bar">
                                    <thead>
                                    <tr>
                                        <th style="min-width: 95px;">
                                            Profile
                                        </th>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th colspan="2">Email</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>
                                                <!--                                            <div class="checkbox checkbox-primary m-r-15">-->
                                                <!--                                                <input id="checkbox2" type="checkbox">-->
                                                <!--                                               <label for="checkbox2"></label>-->
                                                <!--                                            </div>-->

                                                <img src="{{ asset("uploads/user_images/". $admin->image)}}"
                                                     alt="contact-img"
                                                     title="contact-img" class="rounded-circle thumb-sm"/>
                                            </td>

                                            <td>
                                                {{$admin->id}}
                                            </td>

                                            <td>
                                                {{$admin->name}}
                                            </td>

                                            <td>
                                                <a href="#" class="text-muted">{{$admin->email}}</a>
                                            </td>

                                            <td>
                                                <a>
                                                    <span class="badge @if($admin -> is_super == 1) {{'badge-info'}} @else {{'badge-warning'}}@endif">
                                                        @if($admin -> is_super == 1)
                                                            {{'Super Admin'}}
                                                        @else
                                                            {{'Admin'}}
                                                        @endif
                                                    </span>
                                                    {{--{{$admin->is_super}}--}}
                                                </a>
                                            </td>
                                            <!--                                            <td>-->
                                            <!--                                                <b><a href="" class="text-dark"><b>356</b></a> </b>-->
                                            <!--                                            </td>-->

                                            <td>
                                                {{$admin->created_at}}
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <!-- table ends -->

                            </div>
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