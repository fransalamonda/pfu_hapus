<?= $this->extend('layout/template_beranda'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- <button type="button" class="btn btn-info" disabled="">Info</button> -->
                        <a class="nav-link active mb-2 btn btn-info" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">Not Started</a>
                        <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">In Progress</a>
                        <a class="nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Completed</a>
                        <!-- <a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content pt-md-0">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-text">Not Started</h3>
                                    <p id="nt">3 </p>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn waves-effect waves-light btn-outline-secondary waves-effect"><i class="fa fa-search"></i></button>
                                                </span>
                                                <!-- <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search"> -->
                                                <input type="text" class="form-control _search" value="" id="search" name="search" placeholder="Search">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table mb-0" id="t_bahan">
                                                    <thead>
                                                        <tr>
                                                            <th>Condition</th>
                                                            <th>Inspection Date</th>
                                                            <th>Equidment Code</th>
                                                            <th>Checkpoint</th>
                                                            <th>Work Status</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div> <!-- end col -->

</div>
<form id="frmDokAdd">
    <div id="mdl_dok_add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">

                <div class="modal-body">
                    <h5 class=" text-center">Action Form</h5>
                    <p class="text-center lead ">Complete Form to Update this case</p>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">

                    <div class="container-fluid">



                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
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
                                <div class="alert alert-warning alert-dismissible mb-0 fade show">
                                    <div class="card">
                                        <div class="col-sm-6 col-lg-4 col-xl-12">
                                            <i class="mdi mdi-file-document"></i> Checklist Notes
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
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;Cancel</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light"><i class="fas fa-save"></i>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</form>

<?= $this->endSection(); ?>