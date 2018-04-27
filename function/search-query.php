<?php

$start=0;
$limit=10;

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}else{
    $id=1;
}

if(isset($_GET['search'])){
    
    
    if(empty($_GET['ref_no']) && empty($_GET['name']) && empty($_GET['department']) && empty($_GET['search_datetime']) && empty($_GET['docu_name'])){
    
        echo emptyAdv();

    }else{
        
        $ref_no             = $_GET['ref_no'];
        $name               = $_GET['name'];
        $sdeparment         = $_GET['department'];
        $search_datetime    = $_GET['search_datetime'];
        $sdocu_name         = $_GET['docu_name'];
        
        $_SESSION['sref_no']            = $_GET['ref_no'];
        $_SESSION['sname']              = $_GET['name'];
        $_SESSION['sdepartment']        = $_GET['department'];
        $_SESSION['search_datetime']    = $_GET['search_datetime'];
        $_SESSION['sdocu_name']         = $_GET['docu_name'];
        
        
        $search_result = search($ref_no, $name, $sdeparment, $search_datetime, $sdocu_name, $start, $limit);
        
    }
    
}elseif(isset($_SESSION['search'])){
    
    if(empty($_SESSION['sref_no']) && empty($_SESSION['sname']) && empty($_SESSION['sdepartment']) && empty($_SESSION['search_datetime']) && empty($_SESSION['sdocu_name'])){
    
        echo emptyAdv();

    }else{
        
        $ref_no             = $_SESSION['sref_no'] ;
        $name               = $_SESSION['sname'] ;
        $sdeparment         = $_SESSION['sdepartment'];
        $search_datetime    = $_SESSION['search_datetime'];
        $sdocu_name         = $_SESSION['sdocu_name'];

        $search_result = search($ref_no, $name, $sdeparment, $search_datetime, $sdocu_name, $start, $limit);
        
    }
}


function search($ref_no, $name, $deparment, $search_datetime, $sdocu_name, $start, $limit){
    
    $querylist      = "";
    $querypage      = "";
        
    $status = "Search Advance Result";
        
    if(!empty($ref_no) ){
        $querylist = "Select * from ds_info where ds_no like '%$ref_no%' ";
            
        $querypage = "Select * from ds_info where ds_no like '%$ref_no%' ";
        
        if(!empty($name) ){
            $querylist .= "and ds_crtr like '%$name%' ";
            
            $querypage .= "and ds_crtr like '%$name%' ";
            
        }
        
        if(!empty($deparment)){
            $querylist .= "and ds_crtr_dept like '%$deparment%'";
        
            $querypage .= "and ds_crtr_dept like '%$deparment%'";
        }
            
        if(!empty($search_datetime)){
            $querylist .= "and ds_crtd_date like '%$search_datetime%' ";
        
            $querypage .= "and ds_crtd_date like '%$search_datetime%' ";
        }
            
        if(!empty($sdocu_name)){
            $querylist .= "and ds_docu_name like '%$sdocu_name%'";
        
            $querypage .= "and ds_docu_name like '%$sdocu_name%'";
        }
            
    }elseif(!empty($name) ){
        $querylist = "Select * from ds_info where ds_crtr like '%$name%' ";
            
        $querypage = "Select * from ds_info where ds_crtr like '%$name%' ";
            
        if(!empty($deparment)){
            $querylist .= "and ds_crtr_dept like '%$deparment%'";
        
            $querypage .= "and ds_crtr_dept like '%$deparment%'";
        }
            
        if(!empty($search_datetime)){
            $querylist .= "and ds_crtd_date like '%$search_datetime%' ";
        
            $querypage .= "and ds_crtd_date like '%$search_datetime%' ";
        }
            
        if(!empty($sdocu_name)){
            $querylist .= "and ds_docu_name like '%$sdocu_name%'";
        
            $querypage .= "and ds_docu_name like '%$sdocu_name%'";
        }
            
    }elseif(!empty($deparment)){
    
        $querylist = "Select * from ds_info where ds_crtr_dept like '%$deparment%'";
        
        $querypage = "Select * from ds_info where ds_crtr_dept like '%$deparment%'";
            
        if(!empty($search_datetime)){
            $querylist .= "and ds_crtd_date like '%$search_datetime%' ";
        
            $querypage .= "and ds_crtd_date like '%$search_datetime%' ";
        }
            
        if(!empty($sdocu_name)){
            $querylist .= "and `ds_docu_name` like '%$sdocu_name%'";
        
            $querypage .= "and `ds_docu_name` like '%$sdocu_name%'";
        }
    
    }elseif(!empty($search_datetime)){
    
        $querylist = "Select * from ds_info where ds_crtd_date like '%$search_datetime%' ";
        
        $querypage = "Select * from ds_info where ds_crtd_date like '%$search_datetime%' ";
            
        if(!empty($assigned_mis)){
        
            $querylist .= "and `ds_docu_name` like '%$sdocu_name%'";
        
            $querypage .= "and `ds_docu_name` like '%$sdocu_name%'";
        
        }
    
    }elseif(!empty($sdocu_name)){
    
        $querylist = "Select * from ds_info where ds_docu_name like '%$sdocu_name%'";
        
        $querypage = "Select * from ds_info where ds_docu_name like '%$sdocu_name%'";
            
    
    }
    
    $querylist .= "order by ds_info_id DESC LIMIT $start, $limit";
        
    $querypage .= "order by ds_info_id DESC";
        
    $_SESSION['search'] = "1";
    
    return array($querylist, $querypage,$_SESSION['search']);
    
}

function emptyAdv(){
    
    return"<script>
            alert('Please input date to search. ');
            </script>
            ";
}

?>