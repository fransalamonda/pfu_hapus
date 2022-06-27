var main = function(){
    controller = "/Home";
    
    var datatable = function(){

        $('.inp_sd').datepicker({ 
            //dateFormat: 'dd-mm-yy' 
            format: 'dd-mm-yyyy',
            autoclose:true,
        });
        $('.inp_ed').datepicker({ 
            format: 'dd-mm-yyyy',
            autoclose:true,
        });
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
            // list_action();
            // $("._wrapper_info").show();
            //                 $("._wrapper_sindi").hide();
        };
        var table   = $("#t_bahan")
        var table_d = $("#t_detail")
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
                            $("#t_bahan > tbody").html(obj.str);
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
        }list_action();

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
                            $("._wrapper_list").hide();
                            $("b#equipment_code").html(obj.eq_code);
                            $("p#waitingcase").html(obj.waitingcase);
                            $("#t_detail > tbody").html(obj.str);
                            //$('._wrapper_info').modal('show');
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
        $("._search").change(function(){
            var sea =$("#search").val();
            list_action();
        });
        
        $(".nots").click(function(e){
            e.preventDefault();
            $("div#_nots").removeClass("tombol-tidakaktif");
            $("div#_nots").addClass("tombol-aktif");
            $("div#_prog").removeClass("tombol-aktif");
            $("div#_prog").addClass("tombol-tidakaktif");
            $("div#_comp").removeClass("tombol-aktif");
            $("div#_comp").addClass("tombol-tidakaktif");

            $("button#nots").addClass("b-tombol-aktif");
            $("button#prog").removeClass("b-tombol-aktif");
            $("button#comp").removeClass("b-tombol-aktif");
            $("._not_started").show();
            $("._t_in_progress").hide();
            $("._t_completed").hide();  
         });
         $(".prog").click(function(e){
            e.preventDefault();
            $("div#_nots").removeClass("tombol-aktif");
            $("div#_nots").addClass("tombol-tidakaktif");
            $("div#_prog").removeClass("tombol-tidakaktif");
            $("div#_prog").addClass("tombol-aktif");
            $("div#_comp").removeClass("tombol-aktif");
            $("div#_comp").addClass("tombol-tidakaktif");

            $("button#nots").removeClass("b-tombol-aktif");
            $("button#comp").removeClass("b-tombol-aktif");
            $("button#prog").addClass("b-tombol-aktif");

            $("._not_started").hide();
            $("._t_in_progress").show();
            $("._t_completed").hide();  
         });
     
        $(".comp").click(function(e){
            e.preventDefault();
            $("div#_nots").removeClass("tombol-aktif");
            $("div#_nots").addClass("tombol-tidakaktif");
            $("div#_prog").removeClass("tombol-aktif");
            $("div#_prog").addClass("tombol-tidakaktif");
            $("div#_comp").removeClass("tombol-tidakaktif");
            $("div#_comp").addClass("tombol-aktif");

            $("button#nots").removeClass("b-tombol-aktif");
            $("button#prog").removeClass("b-tombol-aktif");
            $("button#comp").addClass("b-tombol-aktif");
            

            $("._not_started").hide();
            $("._t_in_progress").hide();
            $("._t_completed").show();
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