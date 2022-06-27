<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--                        - Sidemenu -->
        <div id="sidebar-menu">

            <div class="user-box">

            </div>

            <ul class="metismenu" id="side-menu">

                <li class="">
                    <!-- <a href="<?= site_url("home/login") ?>" class="waves-effect"> -->
                    <a href="/pfu/public/assets/images/favicon.ico" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Beranda </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-account-edit-outline"></i>
                        <span> Manajemen Pengguna</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/pfu/public/assets/images/favicon.ico" class="waves-effect ">User Admin</a></li>
                        <!-- <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users") ?>">User Admin 1</a></li> -->
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users_tpt") ?>">User TPT</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users_tpitpu") ?>">User TPI/TPU</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users_prov") ?>">User Tim Provinsi</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users_kabkota") ?>">User Tim Kab/Kota</a></li>
                        <!--                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_users_tpt_daerah") ?>">User TPT Daerah</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-palette"></i>
                        <span> Manajemen Data</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_modul_1") ?>">Modul 1</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_modul_2") ?>">Modul 2</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_modul_3") ?>">Modul 3</a></li>
                        <!--                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("Unavailable_page") ?>">Modul 3</a></li>-->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-cloud-outline"></i>
                        <span> Upload Dokumen</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <!-- <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_M_Bahan_dukung") ?>">Bahan Dukung</a></li> -->
                        <li><a href="/sm/backend/public/PPD1_M_Bahan_dukung" class="waves-effect ">Bahan Dukung</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_M_Dokumen_Prov") ?>">Provinsi </a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_M_Dokumen_Kab") ?>">Kabupaten</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_M_Dokumen_Kota") ?>">Kota </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-file-table-box-multiple-outline"></i>
                        <span> Laporan Penilaian </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">

                        <li>
                            <a href="javascript: void(0);" aria-expanded="false"> Penilaian TPT
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li><a href="/sm/backend/public/PPD1_status_penilaian_prov" class="waves-effect ">Provinsi</a></li>
                                <!-- <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_status_penilaian_prov") ?>">Provinsi</a></li> -->
                                <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_status_penilaian_kab") ?>">Kabupaten</a></li>
                                <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_status_penilaian_kota") ?>">Kota</a></li>
                                <!--                                                <li>
                                <a href="javascript: void(0);">Level 2.2</a>
                            </li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">Penilaian TPI/TPU
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="false">Tahap II
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-third-level nav" aria-expanded="false">
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t2_penilaian") ?>">Provinsi</a></li>
                                        <!--                                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("Unavailable_page") ?>">Provinsi</a></li>-->
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t2_penilaian_kab") ?>">Kabupaten</a></li>
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t2_penilaian_kota") ?>">Kota</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="false">Tahap III
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-third-level nav" aria-expanded="false">
                                        <!--                                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_status_penilaian_prov") ?>">Provinsi</a></li>-->
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t3_penilaian") ?>">Provinsi</a></li>
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t3_penilaian_kab") ?>">Kabupaten</a></li>
                                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_t3_penilaian_kota") ?>">Kota</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="waves-effect link_target" data-target="<?php echo site_url("Penilaian_Kab") ?>">
                                <!--                                        <i class="mdi mdi-file-table-box-outline"></i>-->
                                <span> Penilaian Daerah </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--                                <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="mdi mdi-file-table-box-multiple-outline"></i>
                    <span> Status Penilaian TPT</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("PPD1_status_penilaian_prov") ?>">Provinsi</a></li>
                </ul>
            </li>-->

                <!--                                <li>
                <a href="#" class="waves-effect link_target" data-target="<?php echo site_url("Penilaian_Kab") ?>">
                    <i class="mdi mdi-file-table-box-outline"></i>
                    <span> Hasil Penilaian </span>
                </a>
            </li>-->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-newspaper-variant-multiple-outline"></i>
                        <span> Kertas Kerja</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_Kertaskerja_Prov") ?>">Provinsi</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_Kertaskerja_Kab") ?>">Kabupaten</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect link_target" data-target="<?php echo site_url("M_Kertaskerja_Kota") ?>">Kota</a></li>
                    </ul>
                </li>
                <!--                                <li>
                <a href="#" class="waves-effect link_target" data-target="<?php echo site_url("Unavailable_page") ?>">
                    <i class="  mdi mdi-newspaper-variant-multiple-outline "></i>
                    <span> Kertas Kerja </span>
                </a>
            </li>-->
                <!--                                <li>
                <a href="<?php echo site_url("Welcome/logout") ?>" class="waves-effect">
                    <i class=" mdi mdi-logout"></i>
                    <span> Log Out </span>
                </a>
            </li>-->

            </ul>

        </div>
        <!--                         End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!--                     Sidebar -left -->

</div>