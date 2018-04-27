<html>

    <header>
    
        <title></title>
        <link rel="icon" type="image/ico" href="favicon.ico">
        <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css"href="css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css"href="css/basic-needs.css"/>
        <link rel="stylesheet" type="text/css"href="css/jquery.simple-dtpicker.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/jquery.simple-dtpicker.js"></script>
        <script>
        
            $(document).ready(function(){
                
                var first_name, last_name, dept_name, crtd_date, ds_no, dept_font_s, dept_font_x, dept_font_y, name_font_s, name_font_x, name_font_y, circleWH, auto_resize;
                
                first_name  = $("#emp_fname").val();
                last_name   = $("#emp_lname").val();
                dept_name   = $("#emp_dept").val();
                crtd_date   = $("#crtd_date").val();
                ds_no       = $("#ds_no").val();
                
                var settings_set = $("#settings_set").val();
                
                
                
                if(settings_set === "yes"){
                    
                    circleWH    = $("#radius").val();
                    dept_font_s = $("#dept_font_size").val();
                    dept_font_x = $("#dept_font_posX").val();
                    dept_font_y = $("#dept_font_posY").val();
                    name_font_s = $("#name_font_size").val();
                    name_font_x = $("#name_font_posX").val();
                    name_font_y = $("#name_font_posY").val();
                    
                    
                } else if(settings_set === "no") {
                    
                        if($("#circleWH").val() !== ""){
                            circleWH    = "80";
                        }else {
                            circleWH    = $("#circleWH").val();
                        }
                        
                        if($("#dept_font_s").val() !== ""){
                            dept_font_s = "8";
                        }else {
                            dept_font_s    = $("#dept_font_s").val();
                        }
                    
                        if($("#dept_font_x").val() !== ""){
                            dept_font_x = "32";
                        }else {
                            dept_font_x    = $("#dept_font_x").val();
                        }
                    
                        if($("#dept_font_y").val() !== ""){
                            dept_font_y = "43";
                        }else {
                            dept_font_y    = $("#dept_font_y").val();
                        }
                    
                        if($("#name_font_s").val() !== ""){
                            name_font_s = "8";
                        }else {
                            name_font_s    = $("#name_font_s").val();
                        }
                    
                        if($("#name_font_x").val() !== ""){
                            name_font_x = "32";
                        }else {
                            name_font_x    = $("#name_font_x").val();
                        }
                    
                        if($("#name_font_y").val() !== ""){
                            name_font_y = "88";
                        }else {
                            name_font_y    = $("#name_font_y").val();
                        }
                    
                    

                        $("#auto_resize").prop("checked",true); // default set
                        auto_resize = "yes";
                   
                }   
                    
                
                    $("#circleWH").val(circleWH);
                    $("#dept_font_s").val(dept_font_s);
                    $("#dept_font_x").val(dept_font_x);
                    $("#dept_font_y").val(dept_font_y);
                    $("#name_font_s").val(name_font_s);
                    $("#name_font_x").val(name_font_x);
                    $("#name_font_y").val(name_font_y);
                
                
                    $("#radius").val(circleWH);
                    $("#dept_font_size").val(dept_font_s);
                    $("#dept_font_posX").val(dept_font_x);
                    $("#dept_font_posY").val(dept_font_y);
                    $("#name_font_size").val(name_font_s);
                    $("#name_font_posX").val(name_font_x);
                    $("#name_font_posY").val(name_font_y);
                
                    $(".circleWH_demo").html(circleWH);
                            
                    $(".dept_font_s_demo").html(dept_font_s);
                    $(".dept_font_x_demo").html(dept_font_x);
                    $(".dept_font_y_demo").html(dept_font_y);
                
                    $(".name_font_s_demo").html(name_font_s);
                    $(".name_font_x_demo").html(name_font_x);
                    $(".name_font_y_demo").html(name_font_y);
                
                myStamp();
                /*
                    alert(first_name+ ' , ' + last_name+ ' , ' +dept_name+ ' , ' +crtd_date + ' , ' +ds_no+ ' , ' +dept_font_s+ ' , ' +dept_font_x+ ' , ' +dept_font_y+ ' , ' +name_font_s+ ' , ' +name_font_x+ ' , ' +name_font_y+ ' , ' +auto_resize+ ' , '+circleWH);
                */
                
                $("#circleWH").change(function(){
                   circleWH    = $("#circleWH").val();
                    $("#radius").val(circleWH);
                    myStamp();
                });
                $("#dept_font_s").change(function(){
                    dept_font_s    = $("#dept_font_s").val();
                    $("#dept_font_size").val(dept_font_s) ;
                    myStamp();
                });
                $("#dept_font_x").change(function(){
                    dept_font_x    = $("#dept_font_x").val();
                    $("#dept_font_posX").val(dept_font_x);
                    myStamp();
                });
                $("#dept_font_y").change(function(){
                    dept_font_y    = $("#dept_font_y").val();
                    $("#dept_font_posY").val(dept_font_y) ;
                    myStamp();
                });
                $("#name_font_s").change(function(){
                    name_font_s    = $("#name_font_s").val();
                    $("#name_font_size").val(name_font_s) ;
                    myStamp();
                });
                $("#name_font_x").change(function(){
                    name_font_x    = $("#name_font_x").val();
                    $("#name_font_posX").val(name_font_x) ;
                    myStamp();
                });
                $("#name_font_y").change(function(){
                    name_font_y    = $("#name_font_y").val();
                    $("#name_font_posY").val(name_font_y) ;
                    myStamp();
                });
                $('#auto_resize').change(function(){
                    if(this.checked){
                       auto_resize = "yes";                        
                    } else {
                        auto_resize = "no";
                    }
                    myStamp();
                });
                
                
                function myStamp(){
                    
                    $.ajax({
                        type: "GET",
                        url: 'function/stamp.php',
                        data: {
                            ds: ds_no, 
                            width: circleWH, 
                            height: circleWH, 
                            fname: first_name, 
                            lname: last_name, 
                            dept: dept_name, 
                            date: crtd_date,
                            dept_s: dept_font_s, 
                            dept_x: dept_font_x, 
                            dept_y: dept_font_y, 
                            name_s: name_font_s, 
                            name_x: name_font_x, 
                            name_y: name_font_y, 
                            auto_resize: auto_resize},
                        success: function(data){
                            var img = jQuery.parseJSON(data);
                            //alert(img);
                            $(".pCircle").html(img[6]);
                            $(".circleWH_demo").html(circleWH);
                            
                            $(".dept_font_s_demo").html(img[0]);
                            $(".dept_font_x_demo").html(img[1]);
                            $(".dept_font_y_demo").html(img[2]);
                            
                            dept_font_s = img[0];
                            dept_font_x = img[1];
                            dept_font_y = img[2];
                            
                            $("#dept_font_s").val(img[0]);
                            $("#dept_font_x").val(img[1]);
                            $("#dept_font_y").val(img[2]);
                            
                            $("#dept_font_size").val(img[0]);
                            $("#dept_font_posX").val(img[1]);
                            $("#dept_font_posY").val(img[2]);
                            
                            $(".name_font_s_demo").html(img[3]);
                            $(".name_font_x_demo").html(img[4]);
                            $(".name_font_y_demo").html(img[5]);
                            
                            name_font_s = img[3];
                            name_font_x = img[4];
                            name_font_y = img[5];
                            
                            $("#name_font_s").val(img[3]);
                            $("#name_font_x").val(img[4]);
                            $("#name_font_y").val(img[5]);
                            
                            $("#name_font_size").val(img[3]);
                            $("#name_font_posX").val(img[4]);
                            $("#name_font_posY").val(img[5]);
                            
                        }
                    });
                }
                
            });
            
        
        </script>
    </header>
    <body class="container">
    
        <div class="row">
            
            <div class="col-12 text-center">
                <input type="" name="settings_set" id="settings_set" value="no">
                <input type="" id="radius" value="">
                                            
                                            
                <input type="" id="dept_font_size" value="">
                <input type="" id="dept_font_posX" value="">
                <input type="" id="dept_font_posY" value="">
                                                
                <input type="" id="name_font_size" value="">
                <input type="" id="name_font_posX" value="">
                <input type="" id="name_font_posY" value="">
                                            
                <input type="" name="emp_full" value="Willem Leonardo">
                <input type="" name="emp_fname" id="emp_fname" value="Willem">
                <input type="" name="emp_lname" id="emp_lname" value="Leonardo">
                <input type="" name="emp_id" id="emp_id" value="1666">
                <input type="" name="emp_dept" id="emp_dept" value="MIS">
                <input type="" name="ds_no" id="ds_no" value="DS-12345-67">
                <input type="" name="emp_dcrtd_dateept" id="crtd_date" value="<?php echo date('Y-m-d'); ?>">
                
                <div class="row">
                    <label class="col-3 col-form-label "></label>
                    <label class="col-6 col-form-label "><b>Circle</b></label>
                    <label class="col-3 col-form-label text-right"></label>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>Radius Size :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="80" max="110" class="slider" name="circleWH" id="circleWH">
                    <p class="circleWH_demo"></p>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>Auto Adjustment:</b></label>
                    <input type="checkbox" class="col-4 col-form-label" name="auto_resize" id="auto_resize" value="auto_resize">
                </div>
            </div>

            <div class="col-12 deptname">

                <div class="row">
                    <label class="col-3 col-form-label "></label>
                    <label class="col-6 col-form-label "><b>Font Department</b></label>
                    <label class="col-3 col-form-label text-right"></label>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>Size :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="8" max="16"  name="dept_font_s"  id="dept_font_s"><p class="dept_font_s_demo"></p>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>position X :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="20" max="40"  name="dept_font_x" id="dept_font_x"><p class="dept_font_x_demo"></p>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>position Y :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="35" max="45"  name="dept_font_y" id="dept_font_y"><p class="dept_font_y_demo"></p>
                </div>

                <div class="row">
                    <label class="col-3 col-form-label "></label>
                    <label class="col-6 col-form-label "><b>Font Name</b></label>
                    <label class="col-3 col-form-label text-right"></label>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>Size :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="8" max="16"  name="name_font_s" id="name_font_s"><p class="name_font_s_demo"></p>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>position X :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="15" max="40"  name="name_font_x" id="name_font_x"><p class="name_font_x_demo"></p>
                </div>
                
                <div class="row">
                    <label class="col-4 col-form-label text-right"><b>position Y :</b></label>
                    <input class="col-4 col-form-label text-left" type="range" min="80" max="110"  name="name_font_y" id="name_font_y"><p class="name_font_y_demo"></p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-4">
            </div>

            <div class="col-4">
                <p class="pCircle"></p>
            </div>
        
            <div class="col-4">
            </div>
                                
        </div> 
    </body>
</html>