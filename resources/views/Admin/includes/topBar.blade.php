


<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('dashboard')}}" class="logo">
                        <span>
                            <img src="{{asset('assets/Admin/images/favicon.ico')}}" alt=""> SmartProMan
                        </span>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list hide-phone">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                   href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-earth"></i> English <i class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        English
                    </a>



                </div>
            </li>




            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                   href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="uploads/users/noImage.png" alt="admin-img" class="rounded-circle"> <span
                            class="ml-1">Admin Name<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <!--                    <div class="dropdown-item noti-title">-->
                    <!--                        <h6 class="text-overflow m-0">Welcome !</h6>-->
                    <!--                    </div>-->

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ti-user"></i> <span>My Account</span>
                    </a>

                    <!-- item-->
                    <!--                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
                    <!--                        <i class="ti-settings"></i> <span>Settings</span>-->
                    <!--                    </a>-->

                    <!-- item-->
                    <!--                    <a href="javascript:void(0);" class="dropdown-item notify-item">-->
                    <!--                        <i class="ti-lock"></i> <span>Lock Screen</span>-->
                    <!--                    </a>-->

                    <!-- item-->
                    <a href="scripts/admin-logoutscript.php" class="dropdown-item notify-item">
                        <i class="ti-power-off"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <!--            <li class="hide-phone app-search">-->
            <!--                <form role="search" class="">-->
            <!--                    <input type="text" placeholder="Search..." class="form-control">-->
            <!--                    <a href=""><i class="fa fa-search"></i></a>-->
            <!--                </form>-->
            <!--            </li>-->
        </ul>

    </nav>

</div>