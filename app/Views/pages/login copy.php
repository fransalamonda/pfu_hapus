<?= $this->extend('layout/template_login'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <!-- <div class="col-lg-7">
    </div> -->
    <div class="col-lg-5">
        </Br>
        </Br>
        </Br>
        </Br>
        </Br>

        </Br>
        </Br>
        <div class="panel-body text-center">
            <div style="display: flex; ">
                <div class="col-lg-6">
                    <h3 class="text-form-judul-satu">
                        <span>WBI </span>
                    </h3>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-form-judul-dua"> WALK BY</Br>INSPECTIONS</span>
                    </h3>
                </div>

            </div>

            <div class="row loginbox" style="width: 85%;margin: 10px auto;  ">
                <!-- <div class="row loginbox" style="width: 85%;margin: 10px auto;  "> -->
                <form class="form-horizontal m-t-20" id="frm_login" action="#" method="post">
                    <input type="hidden" name="<?= csrf_token(); ?>" id="csrf" value="<?= csrf_hash(); ?>" />
                    <div class="form-group input_wrapper">
                        <input class="form-control " autocomplete="off" type="text" name="userid" placeholder="ID Login" value="<?= set_value('userid'); ?>">
                    </div>
                    <div class="form-group input_wrapper">
                        <input class="form-control " type="password" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">

                            <button class="btn btn-dark btn-lg btn-block waves-effect waves-light" type="submit"><i class="fa fa-sign-in"></i> Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</Br>
</Br>
</Br>
</Br>
</Br>
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body ">
                <!-- <div class="bg-overlay"></div> -->
                <div style="display: flex; ">
                    <div class="col-lg-6">
                        <h3 class="text-form-judul-satu">
                            <span>WBI </span>
                        </h3>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="text-form-judul-dua"> WALK BY</Br>INSPECTIONS</span>
                        </h3>
                    </div>

                </div>
            </div>

            <div class="card-body p-4 mt-2">
                <form action="#" class="p-3">

                    <div class="form-group mb-3">
                        <input class="form-control" type="email" required="" placeholder="Username">
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" type="password" required="" placeholder="Password">
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>

                    <div class="form-group text-center mt-5 mb-4">
                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In </button>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-7">
                            <a href="pages-recoverpw.html"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="pages-register.html">Create an account</a>
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->

        <!-- end row -->

    </div>
    <!-- end col -->
</div>
<?= $this->endSection(); ?>