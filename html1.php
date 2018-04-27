<?php 
    $name   = $_GET['name'];
    $name_f = $_GET['name_f'];
    $name_x = $_GET['name_x'];
    $name_y = $_GET['name_y'];
    $width  = $_GET['width'];
    $height = $_GET['height'];

    //echo $width." ".$height;

    echo createImage($width, $height, $name, $name_f, $name_x, $name_y);
    print "<img src=image.png?".date("U").">";

function createImage($width, $height, $name, $name_f, $name_x, $name_y){
    
    $radius = $width;
    
    $dept = "WHD1";
    $regular_font_style = "fonts/arial.ttf";
    $bold_font_style    = "fonts/arialbd.ttf";
    
    $im = @imagecreate(120, 120) or die("Cannot Initialize new GD image stream");
    $red = imagecolorallocate($im, 255,   0,   0);
    $bgc = imagecolorallocatealpha($im, 255, 255, 255, 0.5);
            
    $circle_posiiton =  ($width / 10) + 50;
    
    imagefill($im,50,10,$bgc);
    imagecolortransparent($im, $bgc);
    
    imagesetthickness($im, 2);
    imagearc($im,  60,  60,  $width,  $height,  0, 360, $red);
    imagearc($im,  60,  60,  $width+2,  $height+2,  0, 360, $red);
    // font size
    
    $font_dept_size = ($width / 9) ;
    $font_dept_x    = 60 - ($width / 3.5);
    $font_dept_y    = (98/ 2 ) - ($radius / 15);
    //$font_dept_x    = (2655/$width );
                //image, size, angle, x, y, color, fontfile, text
    imagettftext($im, $font_dept_size, 0, $font_dept_x, $font_dept_y, $red, $bold_font_style, "PET ".$dept);
    
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
    //$font_name_size = ($width / 9) ;
    //$font_name_x    = 60 - ($width / 3.2);
    //$font_name_y    = (166/ 2 ) + ($radius / 14);
            //image, font, angle, x, y , color, font style, text
    //imagettftext($im, $font_name_size, 0, $font_name_x, $font_name_y, $red, $regular_font_style, $name);
    //echo "<br> ".$font_name_x."<br>".$font_name_y;
    
    imagettftext($im, $name_f, 0, $name_x, $name_y, $red, $regular_font_style, $name);
    
    imagepng($im,"image.png");
    imagedestroy($im);
}


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
?>