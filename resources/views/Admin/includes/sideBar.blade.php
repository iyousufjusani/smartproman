

<div class="left side-menu">
    <div class="user-details">
        <div class="pull-left">
            <img src="{{ asset("uploads/user_images/". Auth::user()->image)}}" alt="admin-img" class="thumb-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="#">{{ Auth::user()->name }}</a>
            <p class="text-muted m-0">Administrator</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
            <li class="menu-title">Navigation</li>
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="ti-home"></i><span> Dashboard </span>
                </a>
            </li>

            <li>


                <a href="{{ route('admins.index') }}">
                    <i class="ti-stamp"></i><span class="badge badge-custom pull-right">0</span>
                    <span> Admins </span>
                </a>
            </li>
            <li>


                <a href="{{ route('users.index') }}">
                    <i class="ti-user"></i><span class="badge badge-custom pull-right">0</span> <span> Users </span>
                </a>
            </li>

            <li>
                <a href="{{ route('types.index') }}">
                    <i class="ti-agenda"></i><span class="badge badge-custom pull-right">0</span>
                    <span> Types </span>
                </a>
            </li>



            <li>
                <a href="javascript: void(0);"><i class="ti-crown"></i> <span> Topics </span> <span
                            class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('topics.index') }}"><span
                                    class="badge badge-custom pull-right">0</span> <span> VIEW TOPICS</span>

                    <li><a href="{{ route('topicDetails.index') }}"> <span> TOPIC DETAILS</span> </a></li>

                </ul>
            </li>


            <li>
                <a href="javascript: void(0);"><i class="ti-marker"></i> <span> Questions </span> <span
                            class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('questions.index') }}"><span
                                    class="badge badge-custom pull-right">0</span> <span> VIEW QUESTIONS</span>
                    <li><a href="{{ route('options.index') }}"><span> VIEW OPTIONS</span>

                    <li><a href="{{ route('questions.create') }}"> <span> ADD </span> </a></li>
                    <!--                    <li><a href="pages-update-topics.php">Update</a></li>-->
                    <!--                    <li><a href="components-widgets.html">Delete</a></li>-->
                </ul>
            </li>


            <li>
                <a href="{{ route('pages.index') }}">
                    <i class="ti-files"></i><span
                            class="badge badge-custom pull-right">0</span> <span> Page Images </span>
                </a>
            </li>

            <li>
                <a href="{{ route('videos.index') }}">
                    <i class="ti-video-camera"></i><span
                            class="badge badge-custom pull-right">0</span> <span> Videos </span>
                </a>
            </li>



            <li>


                <a href="{{ route('messages.index') }}">
                    <i class="ti-email"></i><span class="badge badge-custom pull-right">
            0</span>
                    <span> Messages </span>
                </a>
            </li>



        </ul>

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>