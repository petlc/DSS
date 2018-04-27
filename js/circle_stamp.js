$(document).ready(function(){
    
   
    $('#auto_resize').change(function(){
        if(this.checked)
            $('.deptname').hide('slow');
        else
            $('.deptname').show('slow');

    });
});

$(document).ready(function(){
    
    
    var first_name  = $("#emp_fname").val();
    var last_name   = $("#emp_lname").val();
    var dept_name   = $("#emp_dept").val();
    var crtd_date   = $("#crtd_date").val();
    var ds_no       = $("#ds_no").val();
    
    var settings_set = $("#settings_set").val();
    
    if(settings_set === "yes"){
        var circleWH   = $("#radius").val();
        
        var dept_font_s  = $("#dept_font_size").val();
        var dept_font_x     = $("#dept_font_posX").val();
        var dept_font_y     = $("#dept_font_posY").val();
        
        var name_font_s  = $("#name_font_size").val();
        var name_font_x     = $("#name_font_posX").val();
        var name_font_y     = $("#name_font_posY").val();
        
        $("#circleWH").val(circleWH);
        $("#dept_font_s").val(dept_font_s); // default set
        $("#dept_font_x").val(dept_font_x);
        $("#dept_font_y").val(dept_font_y);
        
        $("#name_font_s").val(name_font_s); // default set
        $("#name_font_x").val(name_font_x);
        $("#name_font_y").val(name_font_y);
        
        $("#auto_resize").prop("checked",false); // default set
    } else if(settings_set === "no") {
        
        var dept_font_s = $("#dept_font_s").val();
    //
    var dept_font_x = $("#dept_font_x").val();
    //
    var dept_font_y = $("#dept_font_y").val();
    
    //
    var name_font_s = $("#name_font_s").val();
    //
    var name_font_x = $("#name_font_x").val();
    //
    var name_font_y = $("#name_font_y").val();
    
    
    //$("#circleWH").val("80");
    var circleWH    = $("#circleWH").val();
        
        $("#dept_font_s").val("8"); // default set
        $("#dept_font_x").val("32"); // default set
        $("#dept_font_y").val("43"); // default set
        
        $("#name_font_s").val("8"); // default set
        $("#name_font_x").val("32"); // default set
        $("#name_font_y").val("88"); // default set
        
        $("#auto_resize").prop("checked",true); // default set
    }
    
                    
    if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
        $('.deptname').hide('slow');
            //alert(auto_resize);
            //alert("checked");
        } else {
            var auto_resize = "no";
        $('.deptname').show('slow');
            //alert(auto_resize);
            //alert("uncheck");
            
        }
    
    
    
    $.ajax({
        type: "GET",
        url: 'function/generate.php',
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
            
            $(".name_font_s_demo").html(name_font_s);
            $(".name_font_x_demo").html(name_font_x);
            $(".name_font_y_demo").html(name_font_y);
        }
    });
                
    $("#circleWH").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                    
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                    
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
        
        var circleWH    = $("#circleWH").val();
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
        
                    
    });
               
    $("#dept_font_s").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
                        
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
    $("#dept_font_x").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
    $("#dept_font_y").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
                        
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
    $("#name_font_s").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
                        
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
    $("#name_font_x").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
                        
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
    $("#name_font_y").change(function(){
        var first_name  = $("#emp_fname").val();
        var last_name   = $("#emp_lname").val();
        var dept_name   = $("#emp_dept").val();
        var crtd_date   = $("#crtd_date").val();
        var ds_no       = $("#ds_no").val();
                        
        var dept_font_s = $("#dept_font_s").val();
        var dept_font_x = $("#dept_font_x").val();
        var dept_font_y = $("#dept_font_y").val();
                        
        var name_font_s = $("#name_font_s").val();
        var name_font_x = $("#name_font_x").val();
        var name_font_y = $("#name_font_y").val();
                        
        var circleWH    = $("#circleWH").val();
                        
        
        if($("#auto_resize").prop("checked") == true){
            
            var auto_resize = "yes";
            //alert(auto_resize);
        } else {
            var auto_resize = "no";
            //alert(auto_resize);
        } 
                    
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
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
                
                document.getElementById("dept_font_s").value =img[0];
                document.getElementById("dept_font_x").value =img[1];
                document.getElementById("dept_font_y").value =img[2];

                $(".name_font_s_demo").html(name_font_s);
                $(".name_font_x_demo").html(name_font_x);
                $(".name_font_y_demo").html(name_font_y);
                
                document.getElementById("name_font_s").value =img[3];
                document.getElementById("name_font_x").value =img[4];
                document.getElementById("name_font_y").value =img[5];
            }
        });
    });
                    
});