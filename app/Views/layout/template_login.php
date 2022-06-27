<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title><?= $tag_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="WBI | Patrol Follow Up" name="description">
    <!-- <meta content="Coderthemes" name="author"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php base_url("") ?>/pfu/public/assets/images/icon_smp.png">
    <link rel="shortcut icon">

    <!-- App css -->
    <link href="<?php base_url("") ?>/pfu/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="<?php base_url("") ?>/pfu/public/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php base_url("") ?>/pfu/public/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    <!-- Plugins css-->
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- Table datatable css -->
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php base_url(); ?>/pfu/public/assets/css/bootstrap.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php base_url(); ?>/pfu/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php base_url(); ?>/pfu/public/assets/css/app.css" rel="stylesheet" type="text/css" id="app-stylesheet" /> 
     <link href="<?php base_url() ?>/pfu/package/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url() ?>/pfu/package/css/style.css" rel="stylesheet" type="text/css" /> -->

    <link href="<?php base_url(); ?>/pfu/public/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="<?php base_url(); ?>/pfu/public/assets/css/patrol.css?v<?= ini_set('date.timezone', "Asia/Jakarta") ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="<?php base_url(); ?>/pfu/public/assets/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php base_url(); ?>/pfu/public/assets/css/userdefined.css?v=<?= ini_set('date.timezone', "Asia/Jakarta") ?>" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-page">

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
            <div class="col-lg-12 col-md-offset-2">
                <?= $this->renderSection('content'); ?>
                <div class="panel-footer text-center">
                    <!-- Copyright &copy;2022 -->
                </div>
            </div>

        </div>
    </div>
    <script>
        var resizefunc = [];
    </script>
    <script src="<?php base_url("") ?>/pfu/public/package/js/jquery.min.js"></script>
    <script src="<?php echo base_url("") ?>/public/package/js/bootstrap.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/js/waves.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/js/wow.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/js/jquery.scrollTo.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/jquery-detectmobile/detect.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/fastclick/fastclick.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/jquery-blockui/jquery.blockUI.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/package/plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="<?php base_url("") ?>/pfu/public/package/js/universal.js?v=<?= date("His") ?>"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/libs/toastr/toastr.min.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/js/pages/toastr.init.js"></script>
    <script src="<?php base_url("") ?>/pfu/public/assets/js/login.js?v=<?= date("His") ?>"></script>
    <script type="text/javascript">
        <?php
        if (isset($js_initial))
            echo $js_initial;
        ?>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</body>

</html>