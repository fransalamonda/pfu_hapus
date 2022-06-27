<!-- Navigation Bar-->
<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>


                <!-- <li class="dropdown notification-list d-none d-md-inline-block">
                    <a href="#" id="btn-fullscreen" class="nav-link waves-effect">
                        <i class="mdi mdi-crop-free noti-icon"></i>
                    </a>
                </li> -->





                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="align-middle"><?= $profile ?> <i class="mdi mdi-chevron-down"></i> </span>
                        <img src="<?php base_url(); ?>/pfu/public/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-power-settings"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <!-- <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li> -->
            </ul>

            <!-- LOGO -->

            <div class="logo-box">


                <a class="logo text-right logo-light">
                    <span class="logo-lg">
                        <span class=" header-tulisan-logo">WBI |</span>

                    </span>


                    <!-- <span class="logo-sm">
                        <span class="logo-lg-text-dark">WBI</span>
                    </span> -->
                </a>

            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

                <li class="dropdown notification-list d-none d-md-inline-block">
                    <a href="/pfu/Wbi" class="nav-link waves-effect">
                        <button href="#" type="button" class=" btn header-btn-aktif waves-effect" id="pf">Patrol Follow Up</button>
                    </a>
                </li>
                <li class="dropdown notification-list d-none d-md-inline-block">
                    <a href="/pfu/Upload_schedule" id="btn" class="nav-link waves-effect">
                        <button type="button" class="btn header-btn-tidak waves-effect" id="us">Upload Schedule</button>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">


                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
<!-- <div class="navbar-custom"> -->


<!-- LOGO -->


<!-- LOGO -->