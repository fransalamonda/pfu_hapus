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
                                        <button type="button" class="btn btn-outline-purple waves-effect waves-light">Download Guidance (excel)</button>

                                    </div>
                                    <div class="card tombol-tidakaktif _prog" id="_prog">
                                        <button type="button" class="btn btn-outline-purple waves-effect waves-light">Download Guidance (Power Poin)</button>
                                    </div>
                                    <div class="card tombol-tidakaktif _comp" id="_comp">
                                        <button type="button" class="btn btn-purple waves-effect waves-light">Download Template</button>
                                    </div>


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

            </div>
            <div class="row">
                <div class="col-md-12 portlets">
                    <!-- Your awesome content goes here -->
                    <div class="mb-5">
                        <form action="/" method="post" class="dropzone dz-clickable" id="myAwesomeDropzone">


                            <div class="dz-message needsclick">
                                <i class="h1 text-muted fas fa-upload mb-4"></i>
                                <h4>Select an Excel file to upload schedule</h4>
                                <span class="text-muted font-13">or drag and drop it her
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>