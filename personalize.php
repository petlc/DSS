<?php
require_once 'restriction.php';

require_once 'function/core.php';
if(isset($_POST['save'])){

    /*
    dept_font_s
    dept_font_x
    dept_font_y
    */
    $emp_full       =   $_POST['emp_full'];
    $emp_fname      =   $_POST['emp_fname'];
    $emp_lname      =   $_POST['emp_lname'];
    $emp_id         =   $_POST['emp_id'];
    $emp_dept       =   $_POST['emp_dept'];

    $radius         =   $_POST['circleWH'];

    $dept_font_s    =   $_POST['dept_font_s'];
    $dept_font_x    =   $_POST['dept_font_x'];
    $dept_font_y    =   $_POST['dept_font_y'];
    $name_font_s    =   $_POST['name_font_s'];
    $name_font_x    =   $_POST['name_font_x'];
    $name_font_y    =   $_POST['name_font_y'];

    $pet_id         =   "pet".$emp_id;

    $save_settings  =   new eSign();

    $save_settings->query("Select * from ds_settings where emp_no = :emp_no");
    $save_settings->bind(':emp_no',$emp_id);
    $save_settings->execute();

    if($save_settings->rowCount() > 0){

        $save_settings->query("Update ds_settings set radius=:radius, dept_font_s=:dept_font_s, dept_font_x=:dept_font_x, dept_font_y=:dept_font_y, name_font_s=:name_font_s, name_font_x=:name_font_x, name_font_y=:name_font_y where emp_no=:emp_no");
        $save_settings->bind(':emp_no',$emp_id);
        $save_settings->bind(':radius',$radius);
        $save_settings->bind(':dept_font_s',$dept_font_s);
        $save_settings->bind(':dept_font_x',$dept_font_x);
        $save_settings->bind(':dept_font_y',$dept_font_y);
        $save_settings->bind(':name_font_s',$name_font_s);
        $save_settings->bind(':name_font_x',$name_font_x);
        $save_settings->bind(':name_font_y',$name_font_y);
        $save_settings->execute();

        echo "<script>alert('The settings is successfully update');</script>";


    }else{

        $save_settings->query("Insert into ds_settings(emp_no, pet_id, radius, dept_font_s, dept_font_x, dept_font_y, name_font_s, name_font_x, name_font_y)Values(:emp_no, :pet_id, :radius, :dept_font_s, :dept_font_x, :dept_font_y, :name_font_s, :name_font_x, :name_font_y)");
        $save_settings->bind(':emp_no',$emp_id);
        $save_settings->bind(':pet_id',$pet_id);
        $save_settings->bind(':radius',$radius);
        $save_settings->bind(':dept_font_s',$dept_font_s);
        $save_settings->bind(':dept_font_x',$dept_font_x);
        $save_settings->bind(':dept_font_y',$dept_font_y);
        $save_settings->bind(':name_font_s',$name_font_s);
        $save_settings->bind(':name_font_x',$name_font_x);
        $save_settings->bind(':name_font_y',$name_font_y);
        $save_settings->execute();

        echo "<script>alert('The settings is successfully save');</script>";
    }
}


// get emp settings

$check_settings  =   new eSign();

$check_settings->query("Select * from ds_settings where emp_no = :emp_no");
$check_settings->bind(':emp_no',$id);
$check_settings->execute();

if($check_settings->rowCount() > 0){

    $settings = "yes";

    $row = $check_settings->single();


}else{

    $settings = "no";
}

?>

<html>
    <head>
        <title>
            Digital Signature System
        </title>
		<link rel="icon" type="image/ico" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/css/fontawesome-all.css"/>
        <link rel="stylesheet" type="text/css" href="css/basic-needs.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery.simple-dtpicker.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/jquery.simple-dtpicker.js"></script>

    </head>
    <body>
        <div class="container-fluid">

            <!-- Header -->
            <div class="">
                <nav class="row navbar navbar-toggleable-md red">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="navbar-brand" >
                        <img src="image/pet1.png">
                        Digital Signature System
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <?php
                            require_once 'function/top-nav.php';
                        ?>
                    </div>
                </nav>
            </div>

            <!-- Body -->
            <div class="pt-5">

                <div class="row">
                    <div class="col-6">

                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-sliders-h" aria-hidden="true"></i> Settings</h4>
                            </div>

                            <div class="card-block">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <input type="hidden" name="settings_set" id="settings_set" value="<?php echo $settings;?>">
                                            <input type="hidden" id="radius" value="<?php echo $row['radius'];?>">


                                            <input type="hidden" id="dept_font_size" value="<?php echo $row['dept_font_s'];?>">
                                            <input type="hidden" id="dept_font_posX" value="<?php echo $row['dept_font_x'];?>">
                                            <input type="hidden" id="dept_font_posY" value="<?php echo $row['dept_font_y'];?>">

                                            <input type="hidden" id="name_font_size" value="<?php echo $row['name_font_s'];?>">
                                            <input type="hidden" id="name_font_posX" value="<?php echo $row['name_font_x'];?>">
                                            <input type="hidden" id="name_font_posY" value="<?php echo $row['name_font_y'];?>">

                                            <input type="hidden" name="emp_full" value="<?php echo $fullname; ?>">
                                            <input type="hidden" name="emp_fname" id="emp_fname" value="<?php echo $firstname; ?>">
                                            <input type="hidden" name="emp_lname" id="emp_lname" value="<?php echo $lastname; ?>">
                                            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="emp_dept" id="emp_dept" value="<?php echo $department; ?>">
                                            <input type="hidden" name="ds_no" id="ds_no" value="DS-12345-67">
                                            <input type="hidden" name="crtd_date" id="crtd_date" value="<?php echo date('Y/m/d'); ?>">
                                            <div class="row">
                                                <label class="col-3 col-form-label "></label>
                                                <label class="col-6 col-form-label "><b><i class="far fa-circle"></i> Circle</b></label>
                                                <label class="col-3 col-form-label text-right"></label>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label text-right"><b>Radius Size :</b></label>
                                                <input class="col-4 col-form-label text-left" type="range" min="80" max="110" class="slider" name="circleWH" id="circleWH">
                                                <p class="circleWH_demo"></p>
                                            </div>
                                            <div class="row">
                                                <label class="col-4 col-form-label text-right"><b>Auto Adjustment:</b></label>
                                                <input type="checkbox" class="col-4 col-form-label" name="auto_resize" id="auto_resize" value="auto_resize" checked>
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
                                    <div class="row pt-3">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-success" name="save">Save Settings</button>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fas fa-eye" aria-hidden="true"></i> Sample Stamp</h4>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-4">
                                    </div>

                                    <div class="col-4">

                                        <script src="js/stamp.js"></script>
                                        <p class="pCircle"></p>
                                    </div>
                                    <div class="col-4">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Footer -->
            <div class="">
            </div>
        </div>
    </body>
</html>
