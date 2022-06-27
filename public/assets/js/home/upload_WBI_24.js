var main = function(){
    controller = "/Upload_schedule";
    
    var datatable = function(){
        var table_wfa   = $("#t_waiting");
        var table_ips   = $("#t_in_progress");
        var table_nrw   = $("#t_need_riview");

        var table   = $("#t_bahan")
        var table_d  = $("#t_detail")
        var table_in = $("#t_in_progress")
        var table_co = $("#t_completed")

        $('.inp_sd').datepicker({ 
            //dateFormat: 'dd-mm-yy' 
            format: 'dd-mm-yyyy',
            autoclose:true,
        });
        $('.inp_ed').datepicker({ 
            format: 'dd-mm-yyyy',
            autoclose:true,
        });
        $('.slt_date').datepicker({ 
            format: 'dd-mm-yyyy',
            autoclose:true,
        });
        $("button#pf").removeClass("header-btn-aktif");
        $("button#pf").addClass("header-btn-tidak");
        $("button#us").removeClass("header-btn-tidak");
        $("button#us").addClass("header-btn-aktif");
        header-btn-aktif
        // window.history.pushState(null, "", window.location.href);        
        // window.onpopstate = function() {
        //     window.history.pushState(null, "", window.location.href);
        //     // list_action();
        //     // $("._wrapper_info").show();
        //     //                 $("._wrapper_sindi").hide();
        // };
        $(".nots").click(function(e){
            e.preventDefault();
            loading.show();
            $("div#_nots").removeClass("tombol-tidakaktif");
            $("div#_nots").addClass("tombol-aktif");
            $("div#_prog").removeClass("tombol-aktif");
            $("div#_prog").addClass("tombol-tidakaktif");
            $("div#_comp").removeClass("tombol-aktif");
            $("div#_comp").addClass("tombol-tidakaktif");

            // $("button#nots").addClass("b-tombol-aktif");
            // $("button#prog").removeClass("b-tombol-aktif");
            // $("button#comp").removeClass("b-tombol-aktif");
            $("._not_started").show();
            $("._t_in_progress").hide();
            $("._t_completed").hide();  
            loading.hide();
        });
         $(".prog").click(function(e){
            e.preventDefault();
            loading.show();
            $("div#_nots").removeClass("tombol-aktif");
            $("div#_nots").addClass("tombol-tidakaktif");
            $("div#_prog").removeClass("tombol-tidakaktif");
            $("div#_prog").addClass("tombol-aktif");
            $("div#_comp").removeClass("tombol-aktif");
            $("div#_comp").addClass("tombol-tidakaktif");

            // $("button#nots").removeClass("b-tombol-aktif");
            // $("button#comp").removeClass("b-tombol-aktif");
            // $("button#prog").addClass("b-tombol-aktif");

            $("._not_started").hide();
            $("._t_in_progress").show();
            $("._t_completed").hide();  
            loading.hide();
         });
     
        $(".comp").click(function(e){
            e.preventDefault();
            loading.show();
            $("div#_nots").removeClass("tombol-aktif");
            $("div#_nots").addClass("tombol-tidakaktif");
            $("button#nots").removeClass("b-tombol-aktif");
            $("button#nots").addClass("b-tombol-tidak-aktif");


            $("div#_prog").removeClass("tombol-aktif");
            $("div#_prog").addClass("tombol-tidakaktif");
            $("button#prog").removeClass("b-tombol-aktif");
            $("button#prog").addClass("b-tombol-tidak-aktif");

            $("div#_comp").removeClass("tombol-tidakaktif");
            $("div#_comp").addClass("tombol-aktif");
            $("button#comp").removeClass("b-tombol-aktif");
            $("button#comp").addClass("b-tombol-aktif");
            

            $("._not_started").hide();
            $("._t_in_progress").hide();
            $("._t_completed").show();
            loading.hide();
        });
        
        /*
            tabel waiting for assgn
        */
        function list_data(){
            loading.show();
            ajax_url = controller+"/list_data";
            ajax_data="id="+$("#search").val();
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text",
                data:ajax_data,
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}

                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            $("#t_waiting > tbody").html(obj.wfa);
                            $("#t_in_progress > tbody").html(obj.ips);
                            $("#t_need_riview > tbody").html(obj.nrw);

                            $("a#v-pills-home-tab").html(obj.not_started);
                            $("p#nt").html(obj.not_action);
                            loading.hide();
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            sweetAlert("Error", obj.msg, "error");
                        }
                        else if(obj.status === 2){
                            sweetAlert("Caution", obj.msg, "warning");
                            // window.setTimeout(function(){
                            //     window.location.href = base_url+"/home";
                            // }, 2000);
                        }

                    }
                    else{
                        sweetAlert("Caution", response, "error");
                        loading.hide();
                        // window.setTimeout(function(){
                        //     window.location.href = base_url+"/home";
                        // }, 2000);
                        // return false;
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    loading.hide(); 
                    alert(thrownError);
                    return false;
                }
            });
        }
        //list_data();

        table_wfa.on('click', 'button.btn-next-1',function(e){
            e.preventDefault();
            loading.show();
            $("div#_nots").removeClass("tombol-aktif");
            $("div#_nots").addClass("tombol-tidakaktif");
            $("div#_prog").removeClass("tombol-tidakaktif");
            $("div#_prog").addClass("tombol-aktif");
            $("div#_comp").removeClass("tombol-aktif");
            $("div#_comp").addClass("tombol-tidakaktif");
            $("._not_started").hide();
            $("._t_in_progress").show();
            $("._t_completed").hide();  
            loading.hide();
        });

        table_wfa.on('click', 'a.btnRes',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");

            ajax_url = controller+"/view_action";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $('#mdl_dok_add').modal('show');
                            $("#deppic").html(obj.str_dept);
                            $("#sttwork").html(obj.str_status);
                            $("#pic").html(obj.str_staf);

                            $("strong#equipment_code").html(obj.Equipment_Code);
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                //list_action();
                                $("._wrapper_info").hide();
                                $("._wrapper_sindi").show();    
                                $('#mdl_dok_add').modal('toggle');
                            }
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });
        });

        //tabel in progress
        table_ips.on('click', 'button.btn-next-2',function(e){
            e.preventDefault();
            loading.show();
                    $("div#_nots").removeClass("tombol-aktif");
                    $("div#_nots").addClass("tombol-tidakaktif");
                    $("button#nots").removeClass("b-tombol-aktif");
                    $("button#nots").addClass("b-tombol-tidak-aktif");


                    $("div#_prog").removeClass("tombol-aktif");
                    $("div#_prog").addClass("tombol-tidakaktif");
                    $("button#prog").removeClass("b-tombol-aktif");
                    $("button#prog").addClass("b-tombol-tidak-aktif");

                    $("div#_comp").removeClass("tombol-tidakaktif");
                    $("div#_comp").addClass("tombol-aktif");
                    $("button#comp").removeClass("b-tombol-aktif");
                    $("button#comp").addClass("b-tombol-aktif");
                    

                    $("._not_started").hide();
                    $("._t_in_progress").hide();
                    $("._t_completed").show();
                    loading.hide();
        });
        table_ips.on('click', 'a.btnRes',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");

            ajax_url = controller+"/view_action";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $('#mdl_dok_add').modal('show');
                            $("#deppic").html(obj.str_dept);
                            $("#sttwork").html(obj.str_status);
                            $("#pic").html(obj.str_staf);

                            $("strong#equipment_code").html(obj.Equipment_Code);
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                //list_action();
                                $("._wrapper_info").hide();
                                $("._wrapper_sindi").show();    
                                $('#mdl_dok_add').modal('toggle');
                            }
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });
        });
        /*
        Action form

        */
        $("#sttwork").change(function(e){
            var stt_kerja = $("#sttwork").val();
            if(stt_kerja=='1'){
                $("label#input_detail").html('Spare Part Detail <span class="text-danger"> *</span>');
                $("label#Date_sparepart").html('Spare Part Arrived (ETA)<span class="text-danger"> *</span>');
                $(".date_select").show();
            }else if(stt_kerja=='2'){
                $("label#input_detail").html('Spare Part Detail <span class="text-danger"> *</span>');
                $("label#Date_sparepart").html('Spare Part (Estimated Arrival Time)<span class="text-danger"> *</span>');
                $(".date_select").show();
            }
            else if(stt_kerja=='3'){
                $("label#input_detail").html('Spare Part Detail <span class="text-danger"> *</span>');
                $("label#Date_sparepart").html('Spare Part (Estimated Arrival Time)<span class="text-danger"> *</span>');
                $(".date_select").show();
            }
            else if(stt_kerja=='4'){
                $("label#input_detail").html('Reason For No Need Action <span class="text-danger"> *</span>');
                $(".date_select").hide();
            }
            else if(stt_kerja=='5'){
                $("label#input_detail").html('Spare Part Detail <span class="text-danger"> *</span>');
                $("label#Date_sparepart").html('Spare Part (Estimated Arrival Time)<span class="text-danger"> *</span>');
                $(".date_select").show();
            }
            $(".area_select").show();
            
        });
















        

        function list_action(){
            loading.show();
            ajax_url = controller+"/list_action";
            ajax_data="id="+$("#search").val();
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text",
                data:ajax_data,
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}

                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            $("#t_waiting > tbody").html(obj.str);
                            $("a#v-pills-home-tab").html(obj.not_started);
                            $("p#nt").html(obj.not_action);
                            //$("._wrapper_bahan").show();
                            //$(".list_kabko").fadeIn();
                            loading.hide();
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            sweetAlert("Error", obj.msg, "error");
                        }
                        else if(obj.status === 2){
                            sweetAlert("Caution", obj.msg, "warning");
                            // window.setTimeout(function(){
                            //     window.location.href = base_url+"/home";
                            // }, 2000);
                        }

                    }
                    else{
                        sweetAlert("Caution", response, "error");
                        loading.hide();
                        // window.setTimeout(function(){
                        //     window.location.href = base_url+"/home";
                        // }, 2000);
                        // return false;
                    }
                },
                error:function (xhr, ajaxOptions, thrownError){
                    loading.hide(); 
                    alert(thrownError);
                    return false;
                }
            });
        }
        //list_action();


        table.on('click', 'a.btnRes',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");
            ajax_url = controller+"/open_detail";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $("#inp_indi").val(id);//inp_indi
                            $("._wrapper_list").hide();
                            $("b#equipment_code").html(obj.eq_code);
                            $("p#waitingcase").html(obj.waitingcase);
                            
                            $("button#nots").html(obj.not_started);
                            $("#t_detail > tbody").html(obj.str);
                            $("button#prog").html(obj.in_progress);
                            $("#t_in_progress> tbody").html(obj.str_2);
                            $("button#comp").html(obj.completed);
                            $("#t_completed> tbody").html(obj.str_3);

                            $("._wrapper_info").hide();
                            $("._wrapper_sindi").show();
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                list_action();
                                $("._wrapper_info").show();
                                $("._wrapper_sindi").hide();    
                            }                        

                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });            
        });
        function list_open_detail(){
            var id = $("#inp_indi").val();
            ajax_url = controller+"/open_detail";
            ajax_data="id="+id;
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $("#inp_indi").val(id);//inp_indi
                            $("._wrapper_list").hide();
                            $("b#equipment_code").html(obj.eq_code);
                            $("p#waitingcase").html(obj.waitingcase);
                            
                            $("button#nots").html(obj.not_started);
                            $("#t_detail > tbody").html(obj.str);
                            $("button#prog").html(obj.in_progress);
                            $("#t_in_progress> tbody").html(obj.str_2);
                            $("button#comp").html(obj.completed);
                            $("#t_completed> tbody").html(obj.str_3);

                            $("._wrapper_info").hide();
                            $("._wrapper_sindi").show();
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                list_action();
                                $("._wrapper_info").show();
                                $("._wrapper_sindi").hide();    
                            }                        

                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });   
        }

        table_d.on('click', 'a.btnCase',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");

            ajax_url = controller+"/view_action";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $('#mdl_dok_add').modal('show');
                            $("#deppic").html(obj.str_dept);
                            $("#sttwork").html(obj.str_status);
                            $("strong#equipment_code").html(obj.Equipment_Code);
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                //list_action();
                                $("._wrapper_info").hide();
                                $("._wrapper_sindi").show();    
                                $('#mdl_dok_add').modal('toggle');
                            }
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });

            
        });

        table_in.on('click', 'a.btnCase',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");

            ajax_url = controller+"/view_action";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $('#mdl_dok_add').modal('show');
                            $("#deppic").html(obj.str_dept);
                            $("#sttwork").html(obj.str_status);
                            $("strong#equipment_code").html(obj.Equipment_Code);
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                //list_action();
                                $("._wrapper_info").hide();
                                $("._wrapper_sindi").show();    
                                $('#mdl_dok_add').modal('toggle');
                            }
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });

            
        });
        table_co.on('click', 'a.btnCase',function(e){
            e.preventDefault();
            var _self       = $(this);
            var id        = _self.data("id");

            ajax_url = controller+"/view_action";
            ajax_data="id="+_self.data("id");
            ajax_data+="&"+csrf_name+"="+$("#csrf").val();
            loading.show();
            jQuery.ajax({
                type: "POST",
                url: base_url+ajax_url,
                dataType:"text", 
                data:ajax_data, 
                success:function(response){
                    var obj = null;
                    try
                    {
                        obj = $.parseJSON(response);  
                    }catch(e)
                    {}
                    if(obj)
                    {
                        $("#csrf").val(obj.csrf_hash);
                        if(obj.status === 1){
                            loading.hide();
                            $('#mdl_dok_add').modal('show');
                            $("#deppic").html(obj.str_dept);
                            $("#sttwork").html(obj.str_status);
                            $("strong#equipment_code").html(obj.Equipment_Code);
                            window.history.pushState(null, "", window.location.href);        
                            window.onpopstate = function() {
                                //list_action();
                                $("._wrapper_info").hide();
                                $("._wrapper_sindi").show();    
                                $('#mdl_dok_add').modal('toggle');
                            }
                        }
                        else if(obj.status === 0){
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                        else if(obj.status === 2){
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );

                            // window.setTimeout(function(){
                            //     window.location.href =base_url+default_controller;
                            // }, 2000);
                        }
                        else{
                            loading.hide();
                            Swal.fire(
                                'Error!',
                                obj.msg,
                                'error'
                              );
                        }
                    }
                    else
                    {
                        sweetAlert("Error", "An Error Occured", "error");
                        loading.hide();
                        return false;
                    }
                },
                error:function (x, status, error){
                    loading.hide(); 
                    if (x.status == 403) {
                        sweetAlert("Error", "Sorry, your session has expired. Please login again to continue", "warning");
                      //  window.location.href =base_url+default_controller;
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                       // window.location.href =base_url+default_controller;
                    }
                }
            });

            
        });
        $("._search").change(function(){
            var sea =$("#search").val();
            list_action();
        });

        $(".btnBack").click(function(e){
            e.preventDefault();
            dua_loading.show();
            list_action();
            $("._wrapper_info").show();
            $("._wrapper_sindi").hide();
            dua_loading.hide();
        });
        
        // table.on('click', 'a.btnRes',function(e){
        //     e.preventDefault();
        //     var _self       = $(this);
        //     var id        = _self.data("id");
        //     ajax_url = controller+"/open_detail";
        //     ajax_data="id="+_self.data("id");
        //     ajax_data+="&"+csrf_name+"="+$("#csrf").val();
        //     loading.show();
        //     $("._wrapper_info").hide();
        //     $("._wrapper_sindi").show();
        //     loading.hide();
        // });
    };
    
    return{
        init:function(){datatable();},
    };
}();