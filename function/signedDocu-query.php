<?php

$status = "My Request";
                        
$start=0;
$limit=10;
                
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}else{
    $id=1;
}

$querylist = "Select * from ds_info where ds_crtr = '$fullname' order by ds_info_id DESC LIMIT $start, $limit";
        
$querypage = "Select * from ds_info where ds_crtr = '$fullname' order by ds_info_id DESC ";

?>