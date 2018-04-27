<?php
require_once 'function/core.php';

if(isset($_POST['login'])){
	if(!empty($_POST['uname']) && !empty($_POST['pword'])){
		$username     = filter_input(INPUT_POST, "uname");
		$password     = filter_input(INPUT_POST, "pword");
        //$lastvisited  = filter_input(INPUT_POST, "lastvisited");
        $accounts = new login();
        //echo $username;
		echo $accounts->loginAccount($username, $password, $lastvisited);
	}else{
		echo"<script>alert('Invalid username or password')</script>";
	}
}

if(isset($_POST['generate_stamp'])){
    
    $full_name   = $_POST['emp_full'];
    $first_name  = $_POST['emp_fname'];
    $last_name   = $_POST['emp_lname'];
    $emp_id      = $_POST['emp_id'];
    $emp_dept    = $_POST['emp_dept'];
    $crtd_date   = $_POST['crtd_date'];
    $docu_name   = basename($_FILES["file"]["name"]);
    $ipaddress   = $_SERVER['REMOTE_ADDR'];
    $table       = "ds_".date("Y");
    
    $regi_stamp = new eSign();
    
    $regi_stamp->query("Insert into $table (ds_no)Values('')");
    $regi_stamp->execute();
    
    $ds_id   = $regi_stamp->lastInsertId();
    $autoinc = sprintf("%05d",$ds_id);
    $ds_no   = "DS-".$autoinc.date("-".'y');
    
    $regi_stamp->query("Update $table set ds_no = :ds_no where ds_id=:ds_id");
    $regi_stamp->bind(":ds_no",$ds_no);
    $regi_stamp->bind(":ds_id",$ds_id);
    $regi_stamp->execute();
    
    $regi_stamp->query("Insert into ds_info (ds_crtr, ds_crtr_id, ds_crtr_dept, ds_no, ds_crtd_date, ds_ip_address, ds_docu_name)Values(:ds_crtr, :ds_crtr_id, :ds_crtr_dept, :ds_no, :ds_crtd_date,  :ds_ip_address, :ds_docu_name)");
    $regi_stamp->bind(":ds_no",$ds_no);
    $regi_stamp->bind(":ds_crtr",$full_name);
    $regi_stamp->bind(":ds_crtr_id",$emp_id);
    $regi_stamp->bind(":ds_crtr_dept",$emp_dept);
    $regi_stamp->bind(":ds_crtd_date",$crtd_date);
    $regi_stamp->bind(":ds_ip_address",$ipaddress);
    $regi_stamp->bind(":ds_docu_name",$docu_name);
    $regi_stamp->execute();
    
    $crtd_date = explode(" ",$crtd_date);
    
    $name = $first_name[0].".".$last_name;
    
    echo createImage($name, $emp_dept, $crtd_date[0], $ds_no);
    print "<img src=image.png?".date("U").">";
    

}

/*
function  createImage($name, $emp_dept, $crtd_date, $ds_no){
        
    $crtd_date = str_replace("-"," / ",$crtd_date);
    
    $dept_name = explode(" ",$emp_dept);
    
    $im = @imagecreate(110, 120) or die("Cannot Initialize new GD image stream");
    
    $regular_font_style = "fonts/arial.ttf";
    $bold_font_style    = "fonts/arialbd.ttf";
    $bgc = imagecolorallocatealpha($im, 255, 255, 255, 0.5);
    $red = imagecolorallocate($im, 255,   0,   0);
    $bgc1 = imagecolorallocatealpha($im, 155, 255, 255, 0.5);
    $tc  = imagecolorallocate($im, 0, 0, 0);
    
    //imagefilledrectangle($im, 0, 0, 149, 49, $bgc);
    /* Output an error message 

    imagefill($im,50,10,$bgc);
    imagesetthickness($im, 3);
    imagecolortransparent($im, $bgc);
    imagearc($im,  50,  50,  95,  95,  0, 360, $red);
    imagearc($im,  50,  50,  96,  96,  0, 360, $red);
    imagearc($im,  50,  50,  97,  97,  0, 360, $red);
    
    $pet_dept       = "PET ".$dept_name[0];
    $pet_dept_cnt   = strlen($pet_dept);
    
    if($pet_dept_cnt == 6){
        $positionX_Dept = "21";
        $fontDept       = "12";

    }elseif($pet_dept_cnt == 7){
        $positionX_Dept = "18";
        $fontDept       = "12";

    }elseif($pet_dept_cnt == 8){
        $positionX_Dept = "13";
        $fontDept       = "11";

    }
    
    //imagestring($im, 5, 19, 18, "PET ".$dept, $red);
                //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, $fontDept, 0, $positionX_Dept, 32, $red, $bold_font_style, $pet_dept);
    
    imagesetthickness($im, 2);
    imageline($im, 6,  37,  94,  37, $red);
    
    //imagestring($im, 4, 10, 43, $crtd_date, $red);
            //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, 11, 0, 7, 56, $red, $regular_font_style, $crtd_date);
    
    imageline($im, 4,  65,  94,  65, $red);

        

    $name_cnt = strlen($name);


    if($name_cnt < 6){
        $positionX = "32";
        $font      = "10";

    }elseif($name_cnt == 6){
        $positionX = "28";
        $font      = "10";

    }elseif($name_cnt == 7){
        $positionX = "22";
        $font      = "10";

    }elseif($name_cnt == 8){
        $positionX = "19";
        $font      = "10";

    }elseif($name_cnt == 9){
        $positionX = "17";
        $font      = "10";

    }elseif($name_cnt == 10){
        $positionX = "15";
        $font      = "10";

    }elseif($name_cnt == 11){
        $positionX = "14";
        $font      = "9";

    }elseif($name_cnt == 12){
        $positionX = "15";
        $font      = "8";

    }elseif($name_cnt == 13){
        $positionX = "19";
        $font      = "7";

    }elseif($name_cnt > 13){
        $positionX = "17";
        $font      = "7";

    }
            //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, $font, 0, $positionX, 80, $red, $regular_font_style, $name);

    //imagestring($im, $font, $positionX, 70, $name, $red);

    imagestring($im, 1, 25, 100, $ds_no, $red);
    imagepng($im,"image.png");
    imagedestroy($im);
}
*/
?>