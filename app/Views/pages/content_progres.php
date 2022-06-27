<?= $this->extend('layout/template_beranda'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row _wrapper_info">
        <div class="col-md-12">
            <div class="card card-border">
                <!-- <div class="card-header border-primary bg-transparent pb-0">
                    <h3 class="card-title text-primary">Informasi</h3>
                </div> -->
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <input type="text" class="form-control _search" value="" id="_search" name="_search" placeholder="Search">
                        <table class="table table-striped mb-0" id="t_bahan">
                            <thead>
                                <tr class="font-tabel-satu">
                                    <th>Conditionnnnn</th>
                                    <th>Equidment Code</th>
                                    <th>Last Inspection</th>
                                    <th>Not Started</th>
                                    <th>In Progres</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="row _wrapper _wrapper_sindi" style="display:none">


        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="float-left">
                                <!-- <h4 class="text-right "><img style="width: 20px; height: 20px;border-radius: 50%;" src="<?php base_url(); ?>/pfu/public/assets/images/Vector_back.png" alt="moltran" height="18">
                                    <b id="equipment_code">tt</b>
                                </h4> -->
                                <button type="button" class="btn btn-outline-secondary waves-effect btnBack"> <img style="width: 20px; height: 20px;border-radius: 50%;" src="<?php base_url(); ?>/pfu/public/assets/images/Vector_back.png" alt="moltran" height="18"> <span></span> </button>
                                <b id="equipment_code">tt</b>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-right mb-0" id="waitingcase" style="color: #505050;">Right aligned text.</p>
                        </div>
                    </div>

                </div>



                <div class="clearfix"></div>
                <div class="card-box">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn waves-effect waves-light btn-outline-secondary waves-effect ">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                <input type="text" class="form-control _search" value="" id="search" name="search" placeholder="Search">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <div style="display: flex;">
                                <div class="card" style="color: #535687;  border-style: dashed; background-color: #EAEBFB; margin-bottom: 15px; margin-right: 1%;">
                                    <!-- <div class="card-body" style="padding: 2px 8px;">
                                        <p class="mb-0">Not Started (<a>3</a>)</p>
                                    </div> -->
                                    <button type="button" class="btn " id="" style="color: #535687;">Not Started (<a>3</a>)</button>
                                </div>

                                <div class="card" style="color: #757575;  border-style: dashed; background-color: #f1f1f1; margin-bottom: 15px; margin-right: 1%;">
                                    <button type="button" class="btn prog" style="color: #d1d1d1;">In Progress (<a>100</a>)</button>
                                    <!-- <div class="card-body" style="padding: 2px 8px;">
                                        <p class="mb-0" style="color: #d1d1d1;">In Progress (<a>100</a>)</p>
                                    </div> -->
                                </div>
                                <div class="card" style="color: #757575;  border-style: dashed; background-color: #f1f1f1; margin-bottom: 15px; margin-right: 1%;">
                                    <button type="button" class="btn comp" style="color: #d1d1d1;">Completed(<a>5</a>)</button>
                                    <!-- <div class="card-body" style="padding: 2px 8px;">
                                        <p class="mb-0" style="color: #d1d1d1;">Completed(<a>5</a>)</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" id="inp_indi" value="" />
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="t_detail">
                            <thead>
                                <tr class="font-tabel-satu">
                                    <th>Condition</th>
                                    <th>Inspection Date</th>
                                    <th>Checkpoin</th>
                                    <th>Ceklist Notes</th>
                                    <th>Work Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>



</div>


<form id="frmDokAdd">
    <div id="mdl_dok_add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class=" text-center text-form-judul">Action Form</h5>
                    <p class="text-center lead text-form-sub-judul">Complete Form to Update this case
                    </p>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">



                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header" style="color: #535687; background-color: #F7F7FD; border-color: #D9DBFF;">
                                        <div class="col-sm-6 col-lg-4 col-xl-12">
                                            <i class="ion ion-md-alert"></i> General Information
                                        </div>
                                        </br>
                                        <div class="col-xl-12">
                                            <!-- <div class="form-group">
                                                <p for="">Condition</p>
                                                <p class=" active"> Need Action</p>
                                            </div> -->
                                            <ul class="list-unstyled mb-0">
                                                <li>Condition</li>
                                                <li><strong>Need action</strong></li>
                                                </br>
                                                <li>Equipment Code</li>
                                                <li><strong class="equipment_code" id="equipment_code"></strong></li>
                                                </br>
                                                <li>Inspection Date</li>
                                                <li>..</li>
                                                <li>Checkpoin Detail</li>
                                                <li>..</li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>
                                <!-- <div class="alert alert-warning alert-dismissible mb-0 fade show"> -->
                                <div class="card">
                                    <div class="card-header" style="color: #BD6626; background-color: #FBF7E4; border-color: #F5D1A7;">
                                        <div class="col-sm-6 col-lg-4 col-xl-12">
                                            <i class="mdi mdi-file-document"></i> Checklist Notes
                                        </div>
                                        </br>
                                        <div class="col-xl-12">

                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-xl-9">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h3 class="card-title">Basic example</h3>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Departemen PIC<span class="text-danger"> *</span></label>
                                                    <select class="form-control" data-toggle="select2" data-placeholder="Select here" id="deppic" name="deppic">
                                                        <!-- <option value="#">&nbsp;</option>
                                                            <option value="United States">Dept 1</option>
                                                            <option value="United Kingdom">Dept 2</option>
                                                            <option value="Afghanistan">Dept 3</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Start Date<span class="text-danger"> *</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inp_sd" placeholder="Select Date" data-provide="datepicker" id="inp_sd" name="inp_sd">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Staffs PIC<span class="text-danger"> *</span></label>
                                                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""> -->
                                                    <select class="form-controlselect2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose a Country...">
                                                        <option value="#">&nbsp;</option>
                                                        <option value="United States">Test 1</option>
                                                        <option value="United Kingdom">Test 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">End Date<span class="text-danger"> *</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control inp_ed" placeholder="Select Date" data-provide="datepicker">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Problem Detail<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" rows="3" id="example-textarea-input"></textarea>

                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Work Status<span class="text-danger"> *</span></label>
                                                    <select class="form-control" data-toggle="select2" data-placeholder="Select here" id="sttwork" name="sttwork">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Maintainance Plan<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" rows="3" id="example-textarea-input"></textarea>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button> -->
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                            <!-- <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- End of Row -->




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
                        <!-- <i class="fas fa-times"></i> -->
                        &nbsp;Cancel
                    </button>
                    <button type="submit" class="btn " style="color: #F7F7FD; background-color: #535687;"><i class="fas fa-save"></i>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</form>

<?= $this->endSection(); ?>