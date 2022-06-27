<!DOCTYPE html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="WBI | Patrol Follow Up">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php base_url("") ?>/pfu/public/assets/images/icon_smp.png">
        <link rel="shortcut icon">

        <title><?= $tag_title ?></title>
        <!-- Plugins css-->
        <link href="<?php base_url(); ?>/pfu/public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url(); ?>/pfu/public/assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url(); ?>/pfu/public/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">

        <!-- App css -->
        <link href="<?php base_url(); ?>/pfu/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php base_url(); ?>/pfu/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url(); ?>/pfu/public/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="<?php base_url(); ?>/pfu/public/assets/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url(); ?>/pfu/public/assets/css/patrol.css?v<?= ini_set('date.timezone', "Asia/Jakarta") ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="<?php base_url(); ?>/pfu/public/assets/css/userdefined.css?v=<?= ini_set('date.timezone', "Asia/Jakarta") ?>" rel="stylesheet" type="text/css" />


    </head>

<body data-layout="horizontal">
    <div class="se-pre-con"></div>
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
    <input type="hidden" id="csrf" value="<?= csrf_hash() ?>" />
    <div id="wrapper">
        <?= $this->include('home/header'); ?>
        <!--  $this->include('home/sidebar');   -->


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
                            Copyright 2022 © <b>|Semen Merah Putih
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
    </div>
    <form id="frmChaPass">
        <div id="modal_change_password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success" style="background: url(<?php base_url(); ?>../assets/icons/bg_modal_5.jpg) no-repeat center center; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: blue;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="card-title mt-1 mb-1" style="color: black;">Ubah Password</h3>
                        <hr style="margin-bottom: 0px;" />
                        <div class="row">

                            <div class="col-12 mb-3 alert alert-info mb-0 fade show _wrapper_statement" style="border-radius: 0px;">
                                <h6 class="text-muted" style="text-align: center;">Password harus lebih dari <b style="color: #8d8d8d;">6 karakter</b>, mengandung huruf <b style="color: #8d8d8d;">BESAR</b>, huruf <b style="color: #8d8d8d;">kecil</b> dan <b style="color: #8d8d8d;">angka</b></h6>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alo">Password saat ini</label>
                                    <div class="input-group">
                                        <input name="opass" class="form-control saatini" type="password" autocomplete="off" />
                                        <button class=" btn-info input-group-text  pIni" type="button"><i class="mdi mdi-eye-minus-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alo">Password baru</label>
                                    <div class="input-group">
                                        <input name="npass" class="form-control saatbaru" type="password" id="new_password" placeholder="Password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka" />
                                        <button class=" btn-info input-group-text  pBaru" type="button"><i class="mdi mdi-eye-minus-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alo">Ulangi Password baru </label>
                                    <div class="input-group">
                                        <input name="cpass" class="form-control saatulang" type="password" placeholder="Password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka" />
                                        <button class=" btn-info input-group-text  pUlang" type="button"><i class="mdi mdi-eye-minus-outline"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid rgb(175, 175, 175); display: flex; justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary waves-effect" data-dismiss="modal" style="border-radius: 0px; padding-left: 10px; padding-right: 10px;"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</button>
                        <button type="submit" class="btn btn-sm btn-success waves-effect waves-light" style="border-radius: 0px; padding-left: 10px; padding-right: 10px;"><i class="fas fa-check"></i>&nbsp;&nbsp;Simpan</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->
    </form>
    <script>
        var resizefunc = [];
    </script>

    <!-- Vendor js -->
    <script src="<?php base_url(); ?>/pfu/public/assets/js/vendor.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/moment/moment.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/jquery-validation/jquery.validate.min.js"></script>
    <!-- third party js -->
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/buttons.bootstrap4.min.js"></script>

    <script src="<?php base_url("") ?>/pfu/public/assets/libs/jszip/jszip.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/pdfmake/vfs_fonts.js"></script>

    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/buttons.print.min.js"></script>

    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.fixedheader.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/datatables/dataTables.scroller.min.js"></script>

    <script src="<?php base_url(); ?>/pfu/public/package/plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/package/plugins/jquery-validation-1.15.0/dist/additional-methods.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/package/plugins/jquery-validation-1.15.0/dist/localization/messages_id.min.js"></script>

    <!-- Plugins Js -->
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/switchery/switchery.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/multiselect/jquery.multi-select.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/select2/select2.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/moment/moment.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php base_url(); ?>/pfu/public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!-- Datatables init -->
    <script src="<?php base_url("") ?>/pfu/public/assets/js/pages/datatables.init.js"></script>
    <!-- Responsive Table js -->
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/rwd-table/rwd-table.min.js"></script>

    <!-- Init js-->
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/dropzone/dropzone.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/js/pages/form-advanced.init.js"></script>
    <!-- Toastr js -->
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/toastr/toastr.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/js/pages/toastr.init.js"></script>

    <!-- App js -->
    <script src="<?php base_url(); ?>/pfu/public/assets/js/app.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/js/universal.js?v=<?= date("His") ?>"></script>

    <script class="js_path" src="<?php echo $js_path ?>"></script>
    <script type="text/javascript">
        <?php
        if (isset($js_initial))
            echo $js_initial;
        ?>
    </script>-->
    <script type="text/javascript">
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</body>

</html>