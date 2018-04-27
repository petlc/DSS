<?php
require_once 'core.php';
if(!empty($_GET['ds'])){

    $ds     = $_GET['ds'];

    $width  = $_GET['width'];
    $height = $_GET['height'];

    $fname  = $_GET['fname'];
    $lname  = $_GET['lname'];
    $dept   = $_GET['dept'];
    $ds     = $_GET['ds'];

    $date   = $_GET['date'];

    $dept_s = $_GET['dept_s'];
    $dept_x = $_GET['dept_x'];
    $dept_y = $_GET['dept_y'];

    $name_s = $_GET['name_s'];
    $name_x = $_GET['name_x'];
    $name_y = $_GET['name_y'];

    $resize = $_GET['auto_resize'];

    $image = createImage($width, $height, $fname, $lname, $dept, $date, $ds, $dept_s, $dept_x, $dept_y, $name_s, $name_x, $name_y, $resize);
    $png = "<img src=function/image.png?".date("U").">";


    //$input = "<input type='file'  class='col-12 btn btn-info'' name='file' required>";
    //echo "<script>alert($png)</script>";
    array_push($image,$png);
    //array_push($image,$input);
    echo json_encode($image);
}

    //echo $width." ".$height;

    //echo createImage($width, $height, $name, $name_f, $name_x, $name_y);
    //print "<img src=image.png?".date("U").">";

function createImage($width, $height, $fname, $lname, $dept, $date, $ds, $dept_s, $dept_x, $dept_y, $name_s, $name_x, $name_y, $resize){

    $radius = $width;

    $name = $fname[0].".".$lname;

    $dept = explode(" ",$dept);
    $date = explode(" ",$date);
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
    imagettftext($im, $font_date_size, 0, $font_date_x, 64, $red, $bold_font_style, $date[0]);

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
        imagettftext($im, $name_s, 0, $name_x, $name_y, $red, $bold_font_style, $name);

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

?>
