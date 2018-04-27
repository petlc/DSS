<?php
session_start();

if(empty($_SESSION['fullname']) && empty($_SESSION['position'])){
    
    echo "<script> alert(".$_SESSION['url']."); </script>";
    header("Location: login.php");
    
}else{
    
    $user_check     = $_SESSION['login_user'];
    $sam            = $_SESSION['login_user'];
    $pass_check     = $_SESSION['login_pass'];
    $fullname       = $_SESSION['fullname'];
    $firstname      = $_SESSION['firstname'];
    $middlename     = $_SESSION['middlename'];
    $lastname       = $_SESSION['lastname'];
    $department     = $_SESSION['department'];
    $position       = $_SESSION['position'];
    $role           = $_SESSION['role'];
    $id             = $_SESSION['id'] ;
    
    $f_init = $firstname[0].".".$lastname;
}

$_SESSION['url'] = $_SERVER['REQUEST_URI'];


?>