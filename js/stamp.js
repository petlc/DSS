$(document).ready(function(){


    $('#auto_resize').change(function(){
        if(this.checked)
            $('.deptname').hide('slow');
        else
            $('.deptname').show('slow');

    });
});
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

        $("#auto_resize").prop("checked",false); // default set
        auto_resize = "no";

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

    $("#circleWH").change(function(){
        circleWH    = $("#circleWH").val();
        $("#radius").val(circleWH);
        myStamp();
    });
    $("#dept_font_s").change(function(){
        dept_font_s    = $("#dept_font_s").val();
        alert(dept_font_s);
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
                //$(".pInput").html(img[7]);
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

/*
$(document).ready(function(){


    var first_name  = $("#emp_fname").val();
    var last_name   = $("#emp_lname").val();
    var dept_name   = $("#emp_dept").val();
    var crtd_date   = $("#crtd_date").val();
    var ds_no       = $("#ds_no").val();

    var settings_set = $("#settings_set").val();

    var circleWH        = $("#radius").val();

    var dept_font_s     = $("#dept_font_size").val();
    var dept_font_x     = $("#dept_font_posX").val();
    var dept_font_y     = $("#dept_font_posY").val();

    var name_font_s     = $("#name_font_size").val();
    var name_font_x     = $("#name_font_posX").val();
    var name_font_y     = $("#name_font_posY").val();


    if($("#auto_resize").prop("checked") == true){

            var auto_resize = "yes";
            //alert(auto_resize);
            $('.deptname').hide();
        } else {
            var auto_resize = "no";
            $('.deptname').show();
        }


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

            $(".name_font_s_demo").html(name_font_s);
            $(".name_font_x_demo").html(name_font_x);
            $(".name_font_y_demo").html(name_font_y);
        }
    });
});
*/
