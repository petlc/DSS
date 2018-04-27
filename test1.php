<?php
if (isset($_GET['term'])){
    
    $searchie = $_GET['term'];
    
    echo json_encode($searchie);
}


?>