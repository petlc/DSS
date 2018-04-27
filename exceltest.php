
<!doctype>
<html>
<head>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script>
    $(document).ready(function(){
    
        $('.btn').change(function () {
            alert($('input[type=file]').val());
            return false;

        });
    });
    </script>
</head>
<body>
<?php
require_once "PHPExcel.php";
    
		$tmpfname = "test.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr><td>";
			 echo $worksheet->getCell('A'.$row)->getValue();
			 echo "</td><td>";
			 echo $worksheet->getCell('B'.$row)->getValue();
			 echo "</td><tr>";
		}
		echo "</table>";	
    $objPHPExcel = PHPExcel_IOFactory::load($tmpfname);
    
    print_r ($objPHPExcel->getProperties());
    
    foreach ($objPHPExcel->getActiveSheet()->getDrawingCollection() as $drawing) {
        //print_r($drawing);
        echo "filename ".$drawing->getDescription()."<br>";
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

    //$objWriter->save('php://output');


    if(isset($_POST['get_info'])){
        
        if(!empty($_FILES['file'])){
            
            print_r($_FILES['file']);
            echo dirname($_FILES['file']['tmp_name']);
            $file_name      = $_FILES['file']['name'];
            $file_name  = explode('.', $file_name);
            $file_name_ext  = end($file_name);
            
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
                move_uploaded_file($tmpfname, "$dir_name.$file_name");
                $upload_file = $dir_name.$file_name;
                //echo "<iframe width='100%' height='400' src='".$upload_file."'></iframe>";
                echo $upload_file;
                
                //fopen($_FILES["UploadFileName"]["tmp_name"], 'r');
                
                //$file = fopen($_FILES["file"]["tmp_name"], 'r');
                echo $file;
                
            }
            
            /*
            foreach($_FILES['file']['name'] as $size=>$val){
                $tmp_size = $_FILES['file']['name'][$size];
                //echo $tmp_size;
            }if(!empty($tmp_size)){
                $tmp_path = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
            }else{
                $tmp_path ="";
                $file_name ="";
            }
            */ 
            
            
        }else{
            
            $tmp_path ="";
            $file_name ="";
            
        }
        
    }
   
    echo "The full path of this file is: " . __FILE__;
    echo "The directory of this file is: " . __DIR__;
?>
    
<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <div class="row">
        <label class="col-4 col-form-label text-right"><b>To sign file :</b></label>
        <div class="col-8 ">
            <input type="file"  class="btn btn-info" name="file" required>
            
        </div> 
    </div>
    <div class="row pt-3">
        <div class="col-4"></div>
        <div class="col-4">
            <button type="submit" class="btn btn-success" name="get_info">Get Info</button>
        </div>
        <div class="col-2"></div>
    </div> 
    </form>
</body>
</html>