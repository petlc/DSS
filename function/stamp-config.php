<?php

$stamp  =   new eSign;

$stamp->query("Select * from ds_settings where pet_id = :pet_id");
$stamp->bind(':pet_id', $username);
$stamp->execute();

if($stamp->rowCount() > 0){
    header("Location:index.php");
}else{
    header("Location:personalize.php");
}
?>
