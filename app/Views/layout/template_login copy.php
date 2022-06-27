<!DOCTYPE html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem Penilaian PPD 2022">
        <meta name="author" content="">
        <!-- <link rel="shortcut icon" href="<?php base_url("/") ?>../public/assets/images/images/logo_bappenas.png"> -->

        <title><?= $title ?></title>
        <!-- <script src="<?php base_url('/'); ?>assets/vendor/purecounter/purecounter.js"></script> -->
        <!-- Base Css Files -->
        <link href="<?php base_url("") ?>../public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Icons -->
        <link href="<?php base_url("") ?>../public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php base_url("") ?>../public/assets/plugins/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php base_url("") ?>../public/assets/css/material-design-iconic-font.min.css" rel="stylesheet">
        <!-- animate css -->
        <link href="<?php base_url("") ?>../public/assets/css/animate.css" rel="stylesheet" />
        <!-- Waves-effect -->
        <link href="<?php base_url("") ?>../public/assets/css/waves-effect.css" rel="stylesheet">
        <link href="<?php base_url("") ?>../public/assets/plugins/sweetalert/dist/sweetalert2.min.css" rel="stylesheet">
        <!-- Custom Files -->
        <link href="<?php base_url("") ?>../public/assets/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php base_url("") ?>../public/assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- <link href="<?php echo base_url(""); ?>/public/package/css/userdefined.css" rel="stylesheet" /> -->
        <script src="<?php base_url("") ?>../public/assets/js/modernizr.min.js"></script>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-offset-2">
                <?= $this->renderSection('content'); ?>
                <div class="panel-footer text-center">
                    Copyright &copy;2022
                </div>
            </div>

        </div>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <script src="<?php base_url("") ?>../public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url("") ?>/public/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url("") ?>../public/assets/js/waves.js"></script>
    <script src="<?php base_url("") ?>../public/assets/js/wow.min.js"></script>
    <script src="<?php base_url("") ?>../public/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php base_url("") ?>../public/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/jquery-detectmobile/detect.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/fastclick/fastclick.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/jquery-blockui/jquery.blockUI.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
    <script src="<?php base_url("") ?>../public/assets/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="<?php base_url("") ?>../public/assets/js/universal.js"></script>
    <script src="<?php base_url("") ?>../public/assets/js/admin/login/login.js"></script>
    <script type="text/javascript">
        <?php
        if (isset($js_initial))
            echo $js_initial;
        ?>
    </script>
</body>

</html>