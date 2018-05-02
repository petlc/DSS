<?php
require_once 'core.php';
require_once "PHPExcel.php";

if(isset($_POST['upload_file'])){

    //print_r($_FILES['file']);
    //echo dirname($_FILES['file']['tmp_name']);
    if(!empty($_POST['ds_no_vali'])){

        $ds_no          = $_POST['ds_no_vali'];
        $file_name      = $_FILES['file_vali']['name'];
        $tmpfname       = $_FILES['file_vali']['tmp_name'];
        $file_type      = $_FILES['file_vali']['type'];
        $file_size      = $_FILES['file_vali']['size'];


    }elseif(!empty($_POST['ds_no'])){

        $ds_no          = $_POST['ds_no'];
        $file_name      = $_FILES['file']['name'];
        $tmpfname       = $_FILES['file']['tmp_name'];
        $file_type      = $_FILES['file']['type'];
        $file_size      = $_FILES['file']['size'];
    }

    $file_name_exp  = explode('.', $file_name);
    $file_name_ext  = end($file_name_exp);



    if($file_name_ext == "xlsx" or $file_name_ext == "xls"){

        $objPHPExcel    = PHPExcel_IOFactory::load($tmpfname);

        $stamp_count    = count($objPHPExcel->getActiveSheet()->getDrawingCollection());

        if($stamp_count > 0){

            $last_stamp     = $objPHPExcel->getActiveSheet()->getDrawingCollection();
            $puton_stamp    = end($last_stamp)->getDescription();

            $stamp_data     = explode('/',$puton_stamp);
            $stamp_name     = end($stamp_data);
            $image_name     = explode('.',$stamp_name);

            if(!empty($stamp_name)){

                $check_file     = new eSign();

                $dec_stamp_name = decryptDS($image_name[0]);
                $super_dec_name = decryptDS($dec_stamp_name);
                $ds_stamp_name  = "$super_dec_name.$image_name[1]";

                $check_file->query("Select * from ds_info where ds_no = :ds_no and ds_docu_name = :ds_docu_name and ds_image_name = :ds_image_name");
                $check_file->bind(":ds_no",$ds_no);
                $check_file->bind(":ds_docu_name",$file_name);
                $check_file->bind(":ds_image_name",$ds_stamp_name);
                $check_file->execute();

                $file_info = $check_file->rowCount();
                //echo "<script>alert($file_info);</script>";
                if($file_info > 0){

                    $validation = "Valid";
                    //$upload_file_path = "$stamp_data[4]/$stamp_data[5]/$stamp_data[6]";

                    $dir_name = "$stamp_data[4]/$stamp_data[5]";
                    move_uploaded_file($tmpfname, "$dir_name/$file_name");
                    $upload_file_path = $dir_name;

                }else{
                    $validation = "Invalid";
                    $upload_file_path = "";

                }

            }else{
                $validation = "Invalid";
                $upload_file_path = "";
            }

        }else{
            $validation = "Invalid";
            $upload_file_path = "";
        }

        //echo $ds_no;
        /*
        $update_file     = new eSign();

        $update_file->query("Update ds_info set ds_file_validation = :ds_file_validation, ds_file_path = :ds_file_path where ds_no = :ds_no");
        $update_file->bind(":ds_file_validation",$validation);
        $update_file->bind(":ds_file_path",$upload_file_path);
        $update_file->bind(":ds_no",$ds_no);
        $update_file->execute();
        */

    }elseif ($file_name_ext == "pdf" or $file_name_ext == "doc" or $file_name_ext == "docx" or $file_name_ext == "ppt" or $file_name_ext == "pptx") {
        // code...

        $ds_info        = explode('-',$ds_no);
        $year           = sprintf("%03d",$ds_info[2]);
        $table          = "ds_2".$year;

        $check_file     = new eSign();

        $check_file->query("Select ds_docu_size from $table where ds_docu_name = :ds_docu_name and ds_no = :ds_no");
        $check_file->bind(":ds_docu_name",$file_name);
        $check_file->bind(":ds_no",$ds_no);
        $check_file->execute();

        if($check_file->rowCount() > 0){

            $row    =   $check_file->single();

            $registered_file = $row['ds_docu_size'];

            $enc_folder_name     = encryptDS($ds_no);
            $super_enc_name      = encryptDS($enc_folder_name);
            $file_path = "assets/$enc_folder_name/$super_enc_name.png";

            $stamp_size = filesize($file_path);;

            $stamped_file_size = 6000 + $registered_file;

            if($file_size > $registered_file && $file_size < $stamped_file_size){
                //echo "from $registered_file to $file_size";

                $validation = "Valid";
                //$upload_file_path = "$stamp_data[4]/$stamp_data[5]/$stamp_data[6]";

                $dir_name = "assets/$enc_folder_name";
                move_uploaded_file($tmpfname, "$dir_name/$file_name");
                $upload_file_path = $dir_name;


            }elseif($file_size <= $registered_file){

                $validation         = "Invalid";
                $upload_file_path   = "";
                $size_movement      = "dec";

            }elseif($file_size > $stamped_file_size){

                $validation         = "Invalid";
                $upload_file_path   = "";
                $size_movement      = "inc";
            }else{
                //echo $stamp_size." ".$registered_file." ".$file_size." ".$stamped_file_size;

                $validation = "Invalid";
                $upload_file_path = "";
            }

        }


    }

    $update_file     = new eSign();

    $update_file->query("Update ds_info set ds_file_validation = :ds_file_validation, ds_file_path = :ds_file_path where ds_no = :ds_no");
    $update_file->bind(":ds_file_validation",$validation);
    $update_file->bind(":ds_file_path",$upload_file_path);
    $update_file->bind(":ds_no",$ds_no);
    $update_file->execute();

}



if(isset($_POST['upload_fileT'])){

    //print_r($_FILES['file']);
    //echo dirname($_FILES['file']['tmp_name']);
    $file_name      = $_FILES['file']['name'];
    $file_name_exp  = explode('.', $file_name);
    $file_name_ext  = end($file_name_exp);

    if($file_name_ext == "xlsx" or $file_name_ext == "xls"){
        //echo "excel";
        $tmpfname = $_FILES['file']['tmp_name'];
        $objPHPExcel = PHPExcel_IOFactory::load($tmpfname);

        echo $objPHPExcel->getProperties()->getLastModifiedBy()."<br>";
        $time = $objPHPExcel->getProperties()->getModified();

        echo date('c', $time);
        $tmpName = str_replace('C:', '..', $tmpfname);

        $file_name      = $_FILES['file']['name'];

        $dir_name = "tmp/";
        move_uploaded_file($tmpfname, "$dir_name$file_name");
        $upload_file = $dir_name.$file_name;
        //echo "<iframe width='100%' height='400' src='".$upload_file."'></iframe>";
        //echo $upload_file;

        //fopen($_FILES["UploadFileName"]["tmp_name"], 'r');

        //$file = fopen($_FILES["file"]["tmp_name"], 'r');
        //echo $file;
        //print_r ($objPHPExcel->getProperties());

        echo $objPHPExcel->getActiveSheet()->getDrawingCollection()[9]->getDescription();

        foreach ($objPHPExcel->getActiveSheet()->getDrawingCollection() as $key => $drawing) {
            //print_r($drawing);
            //echo "filename ".$key." ".$drawing->getDescription()."<br>";
            //echo $drawing->getCreator();
            //echo $drawing['_description:protected'];

            $filename = $drawing->getDescription();
            $pass = '1234';
            $method = 'AES-128-ECB';
            $options = "";
            $iv = "";

            /*
            echo openssl_encrypt ($filename, $method, $pass)."<br>";
            $string = openssl_encrypt ($filename, $method, $pass);
            echo openssl_decrypt ($string, $method, $pass)."<br>";
            */
        }

        if(!empty($file_name)){
            $dir_name = "attachments/".$ic_no;
            if(file_exists($dir_name)){

            }else{
                mkdir("$dir_name");
                $uploads_dir = "$dir_name";

                $upload_file = "";
                foreach($file_name as $key=>$val ){
                    $upload_file_path = $tmp_path[$key];
                    $upload_file_name = $file_name[$key];
                    move_uploaded_file($upload_file_path, "$uploads_dir/$upload_file_name");
                    $upload_file .= $uploads_dir."/".$upload_file_name.",";
                }


            }
        }

    }
}

?>
