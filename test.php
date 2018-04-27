
<?php

$crtd_date = date("Y/m/d H:m");

$crtd_date  = explode(" ",$crtd_date);
$name       = "W.Dotow";
$emp_dept   = "MIS (Iloilo)";
$ds_no      = "DS-12345-18";

echo createImage2($name, $emp_dept, $crtd_date[0], $ds_no);
    print "<img src=image.png?".date("U").">";



function  createImage1($name, $emp_dept, $crtd_date, $ds_no){
        
    $dept = substr($emp_dept, 0, 3);
    
    $im = @imagecreate(110, 120) or die("Cannot Initialize new GD image stream");
    
    $regular_font_style = "fonts/arial.ttf";
    $bold_font_style    = "fonts/arialbd.ttf";
    $bgc = imagecolorallocatealpha($im, 255, 255, 255, 0.5);
    $red = imagecolorallocate($im, 255,   0,   0);
    $bgc1 = imagecolorallocatealpha($im, 155, 255, 255, 0.5);
    $tc  = imagecolorallocate($im, 0, 0, 0);
    
    //imagefilledrectangle($im, 0, 0, 149, 49, $bgc);
    /* Output an error message */

    imagefill($im,50,10,$bgc);
    imagesetthickness($im, 3);
    imagecolortransparent($im, $bgc);
    imagearc($im,  50,  50,  95,  95,  0, 360, $red);
    imagearc($im,  50,  50,  96,  96,  0, 360, $red);
    imagearc($im,  50,  50,  97,  97,  0, 360, $red);
    
    //imagestring($im, 5, 19, 18, "PET ".$dept, $red);
                //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, 12, 0, 18, 32, $red, $bold_font_style, "PET ".$dept);
    
    imageline($im, 6,  37,  94,  37, $red);
    
    //imagestring($im, 4, 10, 43, $crtd_date, $red);
            //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, 9, 0, 6, 56, $red, $regular_font_style, $name );
    
    imageline($im, 4,  65,  94,  65, $red);

        

    $name_cnt = strlen($name);


    if($name_cnt == 6){
        $positionX = "25";
        $font      = "2";

    }elseif($name_cnt == 7){
        $positionX = "24";
        $font      = "2";

    }elseif($name_cnt == 8){
        $positionX = "23";
        $font      = "2";

    }elseif($name_cnt == 9){
        $positionX = "21";
        $font      = "2";

    }elseif($name_cnt == 10){
        $positionX = "17";
        $font      = "2";

    }elseif($name_cnt == 11){
        $positionX = "18";
        $font      = "2";

    }elseif($name_cnt == 12){
        $positionX = "16";
        $font      = "2";

    }elseif($name_cnt == 13){
        $positionX = "13";
        $font      = "2";

    }elseif($name_cnt > 13){
        $positionX = "10";
        $font      = "2";

    }
                //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, 10, 0, 20, 83, $red, $regular_font_style, $crtd_date);

    //imagestring($im, $font, $positionX, 70, $name, $red);

    imagestring($im, 1, 25, 100, $ds_no, $red);
    imagepng($im,"image.png");
    imagedestroy($im);
}



function  createImage2($name, $emp_dept, $crtd_date, $ds_no){
        
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
    /* Output an error message */

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
    imagettftext($im, 11, 0, 14, 56, $red, $regular_font_style, $crtd_date);
    
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

?>
