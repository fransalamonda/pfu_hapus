<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <title><?= $tag_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Penilaian PPD 2022" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url("") ?>../assets/images/logo_bappenas.png">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Plugins css-->
    <link href="<?php base_url(); ?>../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>../assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- Table datatable css -->
    <link href="<?php base_url(); ?>../assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>../assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>../assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>../assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!--USERDEFINED-->

    <!-- App css -->
    <link href="<?php base_url(); ?>../assets/css/bootstrap.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php base_url(); ?>../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>../assets/css/app.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- Notification css (Toastr) -->
    <link href="<?php base_url(); ?>../assets/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />


    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Lato', sans-serif;
            /* font-family: 'Open Sans', sans-serif; */
            /* font-family: 'Poppins', sans-serif; */
            /* font-family: 'Roboto', sans-serif; */
        }

        /* #sidebar-menu > ul > li > a.active {
                color: white;
                background: #317eeb;
            } */

        a.active {
            color: black !important;
            background-color: white !important;
        }

        .mm-active>a.active {
            color: white !important;
            background: #317eeb !important;
        }

        .bold {
            color: white !important;
            background: #317eeb;
        }

        .mm-active .bold {
            color: white !important;
            background: #317eeb;
        }

        /* .enlarged #sidebar-menu > ul > li > a.active:hover {
                color: white;
                background: #317eeb;
            } */

        .enlarged .left-side-menu .help-box {
            display: none;
        }

        /* .row {
                display: grid;
            } */

        ._wrapper_item {
            display: block;
        }
    </style>

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: rgba(255, 99, 71, 0.3);
            color: white;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: rgba(255, 99, 71, 1);
        }
    </style>

    <style>
        .change-table-background-color {
            background-color: #E9E9E9 !important;
        }
    </style>

    <style>
        @media only screen and (max-width: 711px) {
            .stepper-navigation-modul1-tpt {
                margin-left: -10px;
            }

            .stepper-navigation-bahan-dukung-tpt {
                margin-left: -85px;
            }

            .stepper-navigation-bahan-dukung-tpt {
                margin-left: -25px;
            }

            .stepper-navigation-unduh-nilai-tpt {
                margin-left: -40px;
            }

            .stepper-navigation-unduh-nilai-tpt {
                margin-left: -40px;
            }

            .stepper-navigation-bahan-dukung-kabkota {
                margin-left: -40px;
            }
        }

        @media only screen and (min-width: 712px) {
            .stepper-navigation-modul1-tpt {
                margin-left: -10px;
            }

            .stepper-navigation-bahan-dukung-tpt {
                margin-left: -25px;
            }

            .stepper-navigation-unduh-nilai-tpt {
                margin-left: -40px;
            }

            .stepper-navigation-bahan-dukung-kabkota {
                margin-left: -40px;
            }

            .title-regional-name {
                font-size: 1rem;
            }

            .btn-unduh-bahan-dukung {
                font-size: 0.7rem;
            }

            .btn-mulai-penilaian {
                font-size: 0.7rem;
            }

            .btn-status {
                font-size: 0.7rem;
            }
        }

        @media only screen and (min-width: 1024px) {
            .title-regional-name {
                font-size: 1.25rem;
            }

            .btn-unduh-bahan-dukung {
                font-size: 0.8rem;
            }

            .btn-mulai-penilaian {
                font-size: 0.8rem;
            }

            .btn-status {
                font-size: 0.8rem;
            }
        }
    </style>

    <script class="js_path" src="<?php echo $js_path ?>"></script>
    <!--        <script class="js_google" src="<?php //echo $js_google
                                                ?>"></script>    -->
</head>

<body>
    <div class="se-pre-con"></div>
    <div class="spinner">

        <div class="rect1"></div>

        <div class="rect2"></div>

        <div class="rect3"></div>

        <div class="rect4"></div>

        <div class="rect5"></div>

    </div>
    <input type="hidden" id="csrf" value="<?php echo $csrf["hash"] ?>" />
    <div id="wrapper">
        <?= $this->include('layout/header'); ?>
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!--Widget-4 -->
                    <div id="content_wrapper">

                        <!-- end row -->
                        <?= $this->renderSection('content'); ?>
                        <!-- end row -->
                    </div>

                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            Copyright 2022 © <b>|Direktorat PEPPD - Kementerian PPN / Bappenas
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
    </div>



    <script>
        var resizefunc = [];
    </script>

    <script src="<?php base_url("") ?>../assets/js/vendor.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/moment/moment.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/jquery-validation/jquery.validate.min.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/jszip/jszip.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/pdfmake/vfs_fonts.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/buttons.print.min.js"></script>

    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.fixedheader.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php base_url("") ?>../assets/libs/datatables/dataTables.scroller.min.js"></script>

    <script src="<?php base_url(); ?>../package/plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
    <script src="<?php base_url(); ?>../package/plugins/jquery-validation-1.15.0/dist/additional-methods.min.js"></script>
    <script src="<?php base_url(); ?>../package/plugins/jquery-validation-1.15.0/dist/localization/messages_id.min.js"></script>

    <script src="<?php base_url("") ?>../assets/js/pages/datatables.init.js"></script>
    <script src="<?php echo base_url("") ?>../assets/libs/rwd-table/rwd-table.min.js"></script>

    <script src="<?php echo base_url("") ?>../assets/js/universal.js?v=<?php echo now("Asia/Jakarta") ?>"></script>
    <script type="text/javascript" class="js_initial">
        <?php
        if (isset($js_init))
            echo $js_init;
        ?>
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</body>

</html>