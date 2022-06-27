    var main = function(){
        controller = "index.php/Pencapaian_indikator";
        var datatable = function(){
            var table = $("#tblPro");
            var datatable = table.DataTable({
                 "processing": true,
                 "serverSide": true,
                 "ajax":{
                     url :base_url+controller+"/get_datatable", // json datasource
                     type: "post",  // method  , by default get
                     error: function(){  // error handling
                             $(".employee-grid-error").html("");
                             $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                             $("#employee-grid_processing").css("display","none");
                     },
                     data: function(d){
                     },
                     "dataSrc": function ( json ) {
                         //$("#ttl_qty").val(json.ttl_qty);
                         return json.data;
                     }

                 },
                 "columnDefs": [                  
                     { "targets": 2, "orderable": false },
                     { "width": "2px", "targets": 0},
                     { "width": "500px", "targets": 1},
//                     { "width": "80px", "targets": 2}                     
                 ],
                 "lengthMenu": [[5, 20, 25, 50, -1], [5, 20, 25, 50, "All"]],
                 "initComplete": function(settings, json) {
     //                console.log(settings);
                 },
                 paging: true,
                 "language": {
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ada data",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            }
            });
            
            var inlineeditable = $("#inline-editable");
//            var editable = inlineeditable.inlineeditable({
//                    inputClass:"form-control form-control-sm",editButton:!1,
//                    deleteButton:!1,
//                    columns:{identifier:[0,"id"],
//                    editable:[[1,"col1"],[2,"col2"],[3,"col3"],[4,"col4"],[6,"col6"]]},
//                
//                    buttons:{
//                        edit:{
//                            class:"btn btn-danger",
//                    html:'<span class="mdi mdi-pencil"></span>',
//                    action:"edit"}},
//                        inputClass:"form-control form-control-sm",
//            deleteButton:!1,
//            saveButton:!1,
//            autoFocus:!1,
//            columns:{
//                identifier:[0,"id"],
//                editable:[[1,"col1"],[2,"col2"],[3,"col3"],[4,"col4"],[6,"col6"]]}
//            });
        };
        
        
        var edittable = function(){
            alert("");
        };
        var table1 = $("#tblPro");
        table1.on('click', 'a.edit', function(e){
                e.preventDefault();
                //$("#customborder_collapse5").attr('disabled','disabled');
            var id      = $(this).data("id");
            var msg_obj = $("#msg");
            ajax_url = controller+"/detail_get";
            ajax_data = "id="+id;
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            $("#iddaerah").val(id);
            jQuery.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_url+ajax_url, //Where to make Ajax calls
                dataType:"text", // Data type, HTML, json etc.
                data:ajax_data, //Form variables
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    //var obj = jQuery.parseJSON(response);

                    if(obj)//if json data
                    {
                        //success msg
                        if(obj.status === 1){
                            loading.hide();
                            $('.list_provinsi').hide();
                            $('.list_penilai').show();
                            $('.module_1').show();
                            //$('form#form_pd input[name="iddaerah"]').val(id);
                            $('form#form_pd label[name="inputnp"]').html(obj.profile);
//                            
                            $('form#form_pd label[name="inputddn"]').html(obj.data[0].nama_provinsi);
                            $('div#kp input[name="kp_user"]').val(obj.profile);
                            $('div#kp input[name="kp_daerah"]').val(obj.data[0].nama_provinsi);
                            
                            $('.table_pencapaian').html(obj.tbl_pencapaian);
                            $('.table_keterkaitan').html(obj.tbl_keterkaitan);
                            $('.table_konsistensi').html(obj.tbl_konsistensi);
                            $('.table_kk').html(obj.tbl_kk);
                            $('.table_inovasi').html(obj.tbl_inovasi);
//                            $('form#form_edit input[name="name_kab"]').val(obj.data[0].nm_kabko);
//                            $('form#form_edit input[name="name_kec"]').val(obj.data[0].nm_kec);
//                            $('form#form_edit input[name="name_kel"]').val(obj.data[0].keldes);
//                            $('form#form_edit input[name="mitra"]').val(obj.data[0].mitra);
//                            $('form#form_edit input[name="rt"]').val(obj.data[0].rt);
//                            $('form#form_edit input[name="rw"]').val(obj.data[0].rw);
//                            $('form#form_edit input[name="manula_lk"]').val(obj.data[0].manula_lk);
//                            $('form#form_edit input[name="manula_pr"]').val(obj.data[0].manula_pr);
//                            $('form#form_edit input[name="dewasa_lk"]').val(obj.data[0].dws_lk);
//                            $('form#form_edit input[name="dewasa_pr"]').val(obj.data[0].dws_pr);
//                            $('form#form_edit input[name="anak_lk"]').val(obj.data[0].anak_lk);
//                            $('form#form_edit input[name="anak_pr"]').val(obj.data[0].anak_pr);
//                            $('form#form_edit input[name="pns"]').val(obj.data[0].pns);
//                            $('form#form_edit input[name="petani"]').val(obj.data[0].petani);
//                            $('form#form_edit input[name="nelayan"]').val(obj.data[0].nelayan);
//                            $('form#form_edit input[name="wiraswasta"]').val(obj.data[0].wiraswasta);
//                                                        $('form#form_edit input[name="peternakan"]').val(obj.data[0].peternakan);
//                            $('form#form_edit input[name="pedagang"]').val(obj.data[0].pedagang);
//                            $('form#form_edit input[name="informal"]').val(obj.data[0].p_informal);
//                            
//                            $('form#form_edit input[name="lain"]').val(obj.data[0].lain);
//                                                        $('form#form_edit input[name="klinik"]').val(obj.data[0].puske);
//                            $('form#form_edit input[name="paud"]').val(obj.data[0].paud);
//                            $('form#form_edit input[name="tk"]').val(obj.data[0].tk);
//                            $('form#form_edit input[name="sdmi"]').val(obj.data[0].sdmi);
//                            $('form#form_edit input[name="smpmts"]').val(obj.data[0].smpmts);
//                            $('form#form_edit input[name="smama"]').val(obj.data[0].smama);
//                            $('form#form_edit input[name="smk"]').val(obj.data[0].smk);
//                            $('form#form_edit input[name="ponpes"]').val(obj.data[0].ponpes);
//                            $('form#form_edit input[name="akademi"]').val(obj.data[0].akademi);
//                            
//                            $('form#form_edit input[name="masjid"]').val(obj.data[0].masjid);
//                            $('form#form_edit input[name="gereja"]').val(obj.data[0].gereja);
//                            $('form#form_edit input[name="pura"]').val(obj.data[0].pura);
//                            $('form#form_edit input[name="ibadahlain"]').val(obj.data[0].lainya);
//                            
//                            $('form#form_edit label[name="cpolsek"]').html(obj.str_pol);
//                            $('form#form_edit label[name="cdk"]').html(obj.str_dk);
//                            $('form#form_edit label[name="cksp"]').html(obj.str_ksp);
//                            $('form#form_edit label[name="cp2t"]').html(obj.str_p2t);
//                            $('form#form_edit label[name="cpd"]').html(obj.str_pd);
//                            
//                            $('form#form_edit label[name="cpkk"]').html(obj.str_pkk);
//                            $('form#form_edit label[name="mtlkk"]').html(obj.str_mtlkk);
//                            $('form#form_edit label[name="cmtp"]').html(obj.str_mtp);
//                            $('form#form_edit label[name="ckarang"]').html(obj.str_karang);
//                            $('form#form_edit label[name="ctpa"]').html(obj.str_tpa);
//                            $('form#form_edit label[name="crm"]').html(obj.str_rm);
//                            $('form#form_edit label[name="ckp"]').html(obj.str_kp);
//                            
//                            $('form#form_edit input[name="ormas"]').val(obj.data[0].ormas);
//                            $('form#form_edit input[name="klainnya"]').val(obj.data[0].k_lain);
//                           // $('form#form_edit input[name="mitra"]').val(obj.data[0].mitra);
//                            //
//                            $('.list_program_wrapper').hide();
//                            $('.formedit_wrapper').show();

                        }
                        //error msg
                        else if(obj.status === 0){
                            loading.hide();
                            sweetAlert("Error", obj.msg, "error");
                        }
                        //session ended msg
                        else if(obj.status === 2){
                            sweetAlert("Error", obj.msg, "error");
                            window.setTimeout(function(){
                                window.location.href = base_url+default_controller; //redirect ke login page
                            }, 2000);
                        }
                        $("#csrf").val(obj.csrf_hash);
                    }
                    else
                    {
                        show_alert_ms(msg_obj,99,response);loading.hide();
                        return false;
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    loading.hide(); 
                    alert(thrownError);
                    return false;
                }
            });        
        });
        $(".btnBack").click(function(e){
            e.preventDefault();
            //form_ch[0].reset();
            $('.list_provinsi').show();
            $('.list_penilai').hide();
            $('.module_1').hide();
        }); 
        
        var tbl_kp = $("#tbl_kp");
        tbl_kp.on('click', 'a.isinilai', function(e){
            e.preventDefault();
            var daerahid = $(".iddaerah");
            //var kp_user = $(".kp_user");
            //var ddn = $("#inputddn");
           // var indkid = $(this).data("id");
            var indkno = $(this).data("nomor");
            var indkbbt = $(this).data("bobot");
           
            $('div#nmp label[name="noidk"]').html(indkno);
            $('div#nmp label[name="bbtidk"]').html(indkbbt);
//            $('.noidk').html(indkno);
            //alert($("#iddaerah"));
            
            var id      = $(this).data("id");
            var msg_obj = $("#msg");
            ajax_url = controller+"/detail_kategori_skor";
            ajax_data = "id="+id;
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            $("#iddaerah").val(id);
            jQuery.ajax({
                type: "POST", // HTTP method POST or GET
                url: base_url+ajax_url, //Where to make Ajax calls
                dataType:"text", // Data type, HTML, json etc.
                data:ajax_data, //Form variables
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    //var obj = jQuery.parseJSON(response);

                    if(obj)//if json data
                    {
                        //success msg
                        if(obj.status === 1){
                            loading.hide();
                            $('.kp_1').hide();
                            $('.kp_2').show();
                            $('.table_ktg_skor').html(obj.table_ktg_skor);
                        }
                        //error msg
                        else if(obj.status === 0){
                            loading.hide();
                            sweetAlert("Error", obj.msg, "error");
                        }
                        //session ended msg
                        else if(obj.status === 2){
                            sweetAlert("Error", obj.msg, "error");
                            window.setTimeout(function(){
                                window.location.href = base_url+default_controller; //redirect ke login page
                            }, 2000);
                        }
                        $("#csrf").val(obj.csrf_hash);
                    }
                    else
                    {
                        show_alert_ms(msg_obj,99,response);loading.hide();
                        return false;
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    loading.hide(); 
                    alert(thrownError);
                    return false;
                }
            });
            
        });
       // var kembali_kp = $("div#nmp span[name='kbl']");
        $(".btnKembali").click(function(e){
            e.preventDefault();
            $('.kp_1').show();
            $('.kp_2').hide();
        });
        var table2 = $("#tbl_skor");
        table2.on('click', 'a.isiskor', function(e){
            alert("");
            $('#mdlKri').modal('show');
        });
    return{
        init:function(){datatable();},
        tble:function(){edittable();},
       // detail:function(){chart();},
    };
    }();