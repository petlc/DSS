<?php
require_once 'core.php';

if(isset($_POST['regi_file'])){

    $full_name   = $_POST['emp_full'];
    $first_name  = $_POST['emp_fname'];
    $last_name   = $_POST['emp_lname'];
    $emp_id      = $_POST['emp_id'];
    $emp_dept    = $_POST['emp_dept'];
    $crtd_date   = $_POST['crtd_date'];
    $docu_name   = basename($_FILES["file"]["name"]);
    $docu_tmp    = basename($_FILES["file"]["tmp_name"]);
    $docu_type   = basename($_FILES["file"]["type"]);
    $docu_size   = basename($_FILES["file"]["size"]);
    $ipaddress   = $_SERVER['REMOTE_ADDR'];
    $table       = "ds_".date("Y");
    $file_valid  = "For Validation";

    $regi_stamp = new eSign();

    $regi_stamp->query("Select * from ds_settings where emp_no = :emp_no");
    $regi_stamp->bind(':emp_no',$emp_id);
    $regi_stamp->execute();

    if($regi_stamp->rowCount() > 0){

        $settings = "yes";

        $row = $regi_stamp->single();


        $regi_stamp->query("Insert into $table (ds_docu_name, ds_docu_type, ds_docu_size)Values(:ds_docu_name, :ds_docu_type, :ds_docu_size)");
        $regi_stamp->bind(":ds_docu_name",$docu_name);
        $regi_stamp->bind(":ds_docu_type",$docu_type);
        $regi_stamp->bind(":ds_docu_size",$docu_size);
        $regi_stamp->execute();

        $ds_id   = $regi_stamp->lastInsertId();
        $autoinc = sprintf("%05d",$ds_id);
        $ds_no   = "DS-".$autoinc.date("-".'y');



        $regi_stamp->query("Insert into ds_info (ds_crtr, ds_crtr_id, ds_crtr_dept, ds_no, ds_crtd_date, ds_ip_address, ds_docu_name, ds_file_validation)Values(:ds_crtr, :ds_crtr_id, :ds_crtr_dept, :ds_no, :ds_crtd_date,  :ds_ip_address, :ds_docu_name, :ds_file_validation)");
        $regi_stamp->bind(":ds_no",$ds_no);
        $regi_stamp->bind(":ds_crtr",$full_name);
        $regi_stamp->bind(":ds_crtr_id",$emp_id);
        $regi_stamp->bind(":ds_crtr_dept",$emp_dept);
        $regi_stamp->bind(":ds_crtd_date",$crtd_date);
        $regi_stamp->bind(":ds_ip_address",$ipaddress);
        $regi_stamp->bind(":ds_docu_name",$docu_name);
        $regi_stamp->bind(":ds_file_validation",$file_valid);
        $regi_stamp->execute();

        $crtd_date = explode(" ",$crtd_date);

        $name = $first_name[0].".".$last_name;

        $enc_folder_name = encryptDS($ds_no);

        $dir_name = "assets/".$enc_folder_name;

        if(!file_exists($dir_name)){

            mkdir("$dir_name");
            $ref = "$dir_name/ref";
            mkdir("$ref");
            move_uploaded_file($docu_tmp, "$ref");

            $regi_stamp->query("Update $table set ds_no = :ds_no, ds_docu_path = :ds_docu_path where ds_id=:ds_id");
            $regi_stamp->bind(":ds_no",$ds_no);
            $regi_stamp->bind(":ds_docu_path",$ref);
            $regi_stamp->bind(":ds_id",$ds_id);
            $regi_stamp->execute();
        }else{

        }

    }else{

        $settings = "no";

        echo "<script>

            alert('Your Stamp settings is not yet set');
            window.location.href = 'personalize.php';

            </script>";
    }



    //echo createImage($name, $emp_dept, $crtd_date[0], $ds_no);
    //print "<img src=image.png?".date("U").">";


}
    if(!empty($_GET['ds'])){

        $ds     = $_GET['ds'];

        $width  = $_GET['width'];
        $height = $_GET['height'];

        $fname  = $_GET['fname'];
        $lname  = $_GET['lname'];
        $dept   = $_GET['dept'];
        $ds     = $_GET['ds'];

        $dept_s = $_GET['dept_s'];
        $dept_x = $_GET['dept_x'];
        $dept_y = $_GET['dept_y'];

        $name_s = $_GET['name_s'];
        $name_x = $_GET['name_x'];
        $name_y = $_GET['name_y'];

        $resize = $_GET['auto_resize'];

        $ds_image_name = $ds."-".date("U");


        $image = createImage($width, $height, $fname, $lname, $dept, $ds, $dept_s, $dept_x, $dept_y, $name_s, $name_x, $name_y, $resize);

        $png = "<img src=function/image.png?$ds_image_name>";

        array_push($image,$png);
        echo json_encode($image);

        //echo "<script>alert('$png');</script>";

    }

    //echo $width." ".$height;

    //echo createImage($width, $height, $name, $name_f, $name_x, $name_y);
    //print "<img src=image.png?".date("U").">";

if(!empty($_GET['ds_id'])){

    $ds_id  = $_GET['ds_id'];

    $search_ds = new eSign();

    $search_ds->query("Select * from ds_info where ds_info_id = :ds_info_id");
    $search_ds->bind(':ds_info_id',$ds_id);
    $search_ds->execute();

    if($search_ds->rowCount() > 0){

        $row            = $search_ds->single();

        $ds_no          = $row['ds_no'];
        $ds_docu_name   = $row['ds_docu_name'];
        $ds_image_name  = $row['ds_image_name'];

        $id_value = array($ds_no, $ds_docu_name, $ds_image_name);

        //$id_values = array_value($id_value);

        echo json_encode($id_value);
    }
}


function createImage($width, $height, $fname, $lname, $dept, $ds, $dept_s, $dept_x, $dept_y, $name_s, $name_x, $name_y, $resize){

    $radius = $width;

    $name = $fname[0].".".$lname;

    $dept = explode(" ",$dept);;
    $regular_font_style = "../fonts/arial.ttf";
    $bold_font_style    = "../fonts/arialbd.ttf";

    $im = @imagecreate(120, 130) or die("Cannot Initialize new GD image stream");
    $red = imagecolorallocate($im, 255,   0,   0);
    $bgc = imagecolorallocatealpha($im, 255, 255, 255, 0.5);

    $circle_posiiton =  ($width / 10) + 50;

    imagefill($im,50,10,$bgc);
    imagecolortransparent($im, $bgc);

    imagesetthickness($im, 2);
    imagearc($im,  60,  60,  $width,  $height,  0, 360, $red);
    imagearc($im,  60,  60,  $width+2,  $height+2,  0, 360, $red);


    // font size
    if($resize == "yes"){

        //$font_dept_size = ($width / 9) ;
        //$font_dept_x    = 60 - ($width / 3.5);
        //$font_dept_y    = (98/ 2 ) - ($radius / 15);
        //$font_dept_x    = (2655/$width );
                    //image, size, angle, x, y, color, fontfile, text
        $dept_s = ($width / 9) ;
        $dept_x    = 60 - ($width / 3.5);
        $dept_y    = (98/ 2 ) - ($radius / 15);
        imagettftext($im, $dept_s, 0, $dept_x, $dept_y, $red, $bold_font_style, "PET ".$dept[0]);

    }else{
        imagettftext($im, $dept_s, 0, $dept_x, $dept_y, $red, $bold_font_style, "PET ".$dept[0]);

    }



    //imagettftext($im, $dept_s, 0, $dept_x, $dept_y, $red, $bold_font_style, "PET ".$dept[0]);
    //imagettftext($im, $dept_s, 0, $dept_x, $dept_y, $red, $bold_font_style, "PET ".$dept[0]);

    // line 1
    $line1_pos      = (105 / 2 ) - ($radius / 15);
    $line1_start    =  60 - ($radius / 2.14);
    $line1_end      =  60 + ($radius / 2.1);
    imageline($im, $line1_start,  $line1_pos,  $line1_end,  $line1_pos, $red);

    // date
    $font_date_size = ($width / 9) ;
    $font_date_x    = 60-($width / 2.75);
    imagettftext($im, $font_date_size, 0, $font_date_x, 64, $red, $regular_font_style, "2018/03/08");

    //echo "<br> ".$font_date_size." ".$font_date_x;

    // line 1
    $line2_pos      = (136 / 2 ) + ($radius / 15);
    $line2_start    =  60 - ($radius / 2.14);
    $line2_end      =  60 + ($radius / 2.1);
    imageline($im, $line2_start,  $line2_pos,  $line2_end,  $line2_pos, $red);

    //name
    if($resize == "yes"){

        //$font_name_size = ($width / 9) ;
        //$font_name_x    = 60 - ($width / 3.2);
        //$font_name_y    = (166/ 2 ) + ($radius / 14);
        $name_s = ($width / 9) ;
        $name_x    = 60 - ($width / 3.2);
        $name_y    = (166/ 2 ) + ($radius / 14);
                //image, font, angle, x, y , color, font style, text
        imagettftext($im, $name_s, 0, $name_x, $name_y, $red, $regular_font_style, $name);

    }else{
        imagettftext($im, $name_s, 0, $name_x, $name_y, $red, $bold_font_style, $name);

    }

    //echo "<br> ".$font_name_x."<br>".$font_name_y;

    //imagettftext($im, $name_s, 0, $name_x, $name_y, $red, $regular_font_style, $name);

    $ds_name_size = ($width / 14) ;
    $ds_name_x    = 60 - ($width / 3.5);
    $ds_name_y    = 75+($width / 2);
            //image, font, angle, x, y , color, font style, text

    imagettftext($im, $ds_name_size, 0, $ds_name_x, $ds_name_y, $red, $regular_font_style, $ds);

    imagepng($im,"image.png");

    return array($dept_s,$dept_x,$dept_y,$name_s,$name_x,$name_y);

    imagedestroy($im);
}

function encryptDS($ds){

    $password   = "petDSS123";
    $method     = 'AES-128-ECB';

    $enc        = openssl_encrypt ($ds, $method, $password);

    return str_replace(array('+', '/'), array('-', '_'), $enc);
}

function decryptDS($enc){

    $ds         = str_replace(array('-', '_'), array('+', '/'), $enc);
    $password   = "petDSS123";
    $method     = 'AES-128-ECB';

    $dec        = openssl_decrypt ($ds, $method, $password);

    return $dec;
}

?>
