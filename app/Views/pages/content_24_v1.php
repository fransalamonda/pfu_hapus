<?= $this->extend('layout/template_beranda'); ?>

<?= $this->section('content'); ?>
<!-- <div class="container-fluid"> -->
<div class="row  _win">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-6">
                    <div class="float-left">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div style="display: flex;">
                                    <div class="card tombol-aktif _nots" id="_nots">
                                        <button type="button" class="btn b-tombol-aktif nots" id="nots"> Waiting for Assign (<a>0</a>)</button>

                                    </div>
                                    <div class="card tombol-tidakaktif _prog" id="_prog">
                                        <button type="button" class="btn b-tombol-tidak-aktif prog" id="prog">In Progress (<a>0</a>)</button>
                                    </div>
                                    <div class="card tombol-tidakaktif _comp" id="_comp">
                                        <button type="button" class="btn b-tombol-tidak-aktif comp" id="comp">Need Review(<a>0</a>)</button>
                                    </div>
                                    <!-- <button type="button" class="btn btn-outline-secondary waves-effect">In Progress (0)</button>
                                    <button type="button" class="btn btn-outline-secondary waves-effect">Need Review (0)</button> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-right mb-0">
                    <!-- <p class="text-right mb-0" id="waitingcase" style="color: #505050;">Right</p> -->
                    <button type="button" class="btn btn-outline-secondary waves-effect">Case History<i class="mdi mdi-history"></i></button>
                </div>
            </div>

            <input type="hidden" id="inp_indi" value="" />
            <div class="table-responsive _not_started">
                <table class="table table-striped mb-0" id="t_waiting">
                    <thead>
                        <tr class="font-tabel-satu">
                            <th>Condition<i></i></th>
                            <th>Inspection Date</th>
                            <th>Checkpoin </th>
                            <th>Checkpoin Detail</th>
                            <th>Checklist Notes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="table-responsive _t_in_progress" style="display:none">
                <table class="table table-striped mb-0" id="t_in_progress">
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
            <div class="table-responsive _t_completed" style="display:none">
                <table class="table table-striped mb-0" id="t_need_riview">
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

<!-- <div class="row _wrapper_info">
    <div class="col-md-12">
        <div class="card card-border">
            <div class="card-body">
                <div style="overflow-x: auto;">

                    <table class="table table-striped mb-0" id="t_bahan">
                        <thead>
                            <tr class="font-tabel-satu">
                                <th>Condition</th>
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
</div> -->



<div class="row _wrapper _wrapper_sindi" style="display:none">


    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="float-left">
                            <button type="button" class="btn btn-outline-secondary waves-effect btnBack" style="border-radius:8em;"> <img style="width: 20px; height: 20px;border-radius: 50%;" src="<?php base_url(); ?>/pfu/public/assets/images/Vector_back.png" alt="moltran" height="18"> <span></span> </button>
                            <b id="equipment_code">tt</b>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-right mb-0" id="waitingcase" style="color: #505050;">Right</p>
                    </div>
                </div>

            </div>



            <div class="clearfix">
                <input type="hidden" id="two_hal" value="" />
            </div>
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
                            <div class="card tombol-aktif _nots" id="_nots">
                                <!-- <div class="card-body" style="padding: 2px 8px;">
                                        <p class="mb-0">Not Started (<a>3</a>)</p>
                                    </div> -->
                                <button type="button" class="btn b-tombol-aktif nots" id="nots"> Not Started (<a>0</a>)</button>
                            </div>

                            <div class="card tombol-tidakaktif _prog" id="_prog">
                                <button type="button" class="btn  prog" id="prog">In Progress (<a>0</a>)</button>
                            </div>
                            <div class="card tombol-tidakaktif _comp" id="_comp">
                                <button type="button" class="btn  comp" id="comp">Completed(<a>0</a>)</button>
                            </div>
                        </div>
                    </div>
                </div>


                <input type="hidden" id="inp_indi" value="" />
                <div class="table-responsive _not_started">
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
                <div class="table-responsive _t_in_progress" style="display:none">
                    <table class="table table-striped mb-0" id="t_in_progress">
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
                <div class="table-responsive _t_completed" style="display:none">
                    <table class="table table-striped mb-0" id="t_completed">
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
<!-- </div> -->





<form id="frmDokAdd">
    <div id="mdl_dok_add" class="modal modal-action-form fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog-form modal-full-form">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class=" text-center text-form-judul">Action Form</h5>
                    <p class="text-center lead text-form-sub-judul">Complete Form to Update this case
                    </p>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">



                        <!-- Row start -->
                        <div class="row">

                            <div class="col-lg-3">
                                <!-- <div class="card"> -->
                                <div class="card-header card-kiri-satu">
                                    <div class="col-sm-6 col-lg-4 col-xl-12">
                                        <i class="ion ion-md-alert"></i> General Information
                                    </div>
                                    </br>
                                    <!-- <div class="col-sm-6 col-lg-4 col-xl-12">
                                        <div class='card-kiri-tulisan-satu'>Condition</div>
                                        <div class="card-kiri-tulisan-dua">Need action</div>
                                        <div class="card-kiri-tulisan-satu">Inspection Date</div>
                                        <div class="card-kiri-tulisan-tiga">22</div>
                                    </div> -->
                                    <div class="col-xl-12">
                                        <!-- <div class="form-group">
                                            <p class='card-kiri-tulisan-satu'>Condition</p>
                                            <p class=" active"> Need Action</p>
                                        </div> -->
                                        <ul class="list-unstyled mb-0">
                                            <li class="card-kiri-tulisan-satu">Condition</li>
                                            <li>
                                                <div class="card-kiri-tulisan-dua">Need action</div>
                                            </li>
                                            </br>
                                            <li class="card-kiri-tulisan-satu">Inspection Date</li>
                                            <li class="card-kiri-tulisan-tiga">22/02/2022
                                            </li>
                                            </br>
                                            <li class="card-kiri-tulisan-satu">Equipment Code</li>
                                            <li>..</li>
                                            </br>
                                            <li class="card-kiri-tulisan-satu">Checkpoint</li>
                                            <li>..</li>
                                            </br>
                                            <li class="card-kiri-tulisan-satu">Checkpoint Detail</li>
                                            <li>..</li>
                                        </ul>
                                    </div>

                                </div>
                                </Br>
                                <!-- </div> -->
                                <!-- <div class="alert alert-warning alert-dismissible mb-0 fade show"> -->
                                <!-- <div class="card"> -->
                                <div class="card-header card-kiri-dua">
                                    <div class="col-sm-6 col-lg-4 col-xl-12">
                                        <i class="mdi mdi-file-document"></i> Checklist Notes
                                    </div>
                                    </br>
                                    <div class="col-xl-12">

                                    </div>

                                </div>

                                <!-- </div> -->


                            </div>


                            <div class="col-lg-9  card-kanan-satu">
                                <div class="row">
                                    <div class="col-lg-6 card-kanan-dua">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Departemen PIC<span class="text-danger"> *</span></label>
                                                            <select class="form-control input-sm" data-toggle="select2" data-placeholder="Select here" id="deppic" name="deppic">
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Staffs PIC<span class="text-danger"> *</span></label>
                                                            <select class="form-controlselect2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose" id="pic" name="pic">

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Problem Detail<span class="text-danger"> *</span></label>
                                                            <textarea class="form-control" rows="3" id="example-textarea-input" placeholder="add description"></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Maintainance Plan<span class="text-danger"> *</span></label>
                                                            <textarea class="form-control" rows="3" id="example-textarea-input"></textarea>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- card-body -->
                                        </div>
                                        <!-- card -->
                                    </div>

                                    <div class="col-lg-6 card-kanan-tiga">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Start Date<span class="text-danger"> *</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control inp_sd" placeholder="Select Date" data-provide="datepicker" id="inp_sd" name="inp_sd" readonly=''>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">End Date<span class="text-danger"> *</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control inp_ed" placeholder="Select Date" data-provide="datepicker" readonly=''>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;">Work Status<span class="text-danger"> *</span></label>
                                                            <select class="form-control" data-toggle="select2" data-placeholder="Select here" id="sttwork" name="sttwork">

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 area_select" style="display:none">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;" id='input_detail'>Spare Part Detail <span class="text-danger"> *</span></label>
                                                            <textarea class="form-control" rows="3" id="area_select" placeholder="add description"></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 date_select" style="display:none">
                                                        <div class="form-group">
                                                            <label style="font-family:'Inter'; font-style: normal; font-weight: 400;font-size: 16px; line-height: 19px; flex: none; order: 0; align-self: stretch;flex-grow: 0;" id="Date_sparepart">Date_select<span class="text-danger"> *</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control slt_date" placeholder="Select Date" data-provide="datepicker" readonly=''>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- card -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary waves-effect btnCancel" name="btnCancel" data-dismiss="modal">
                                        <!-- <i class="fas fa-times"></i> -->
                                        &nbsp;Cancel
                                    </button>
                                    <button type="submit" class="btn " style="color: #F7F7FD; background-color: #535687;">&nbsp;Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Row -->








            </div>


        </div>

    </div>
    </div>
    </div><!-- /.modal -->
</form>

<?= $this->endSection(); ?>