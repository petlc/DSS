<?php

require_once 'function/function.php';

/*
session_start();

if(empty($_SESSION['url'])){
    
    $url = "index.php";
}else{
    $url = $_SESSION['url'];
}
*/
?>
<html>
    <head>
        <title>
            Digital Signature System
        </title>
        <link rel="icon" type="image/ico" href="favicon.ico">
        <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css"href="css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css"href="css/basic-needs.css"/>
        <link rel="stylesheet" type="text/css"href="css/jquery.simple-dtpicker.css"/>
        <link rel="stylesheet" type="text/css"href="css/login.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/jquery.simple-dtpicker.js"></script>
        <style>
        
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="row navbar navbar-toggleable-md navbar-light red">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-brand py-4">
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    
                    
                </div>     
            </nav>
            <div class="row  login">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="navbar-brand system" >
                                <img src="image/pet1.png">
                                Digital Signature System
                            </div>
                        </div>
                        <div class="card-block">
                            <form method="post">
                                <!--
                                <input class="form-control mr-sm-2" type="hidden" name="lastvisited" value="<?php echo $url; ?>">
                                -->
                                <div class="row pt-5">
                                    <label class="col-4 col-form-label text-right"><b>Username :</b></label>
                                    <input class="form-control col-4" type="text" name="uname" placeholder="petxxxx">
                                </div>
                                <div class="row pt-3">
                                    <label class="col-4 col-form-label text-right"><b>Password :</b></label>
                                    <input class="form-control col-4" type="password" name="pword" >
                                </div>

                                <div class="row pt-3 pb-5">
                                    <div class="col-4"></div>
                                    <button type="submit" class="btn btn-success col-4" name="login">Login</button>

                                </div>
                            </form>
                             
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            
            <div class="row navbar navbar-light red content footer">
                <div class="text-center">&copy; all rights reserved 2018</div>
            </div>
        </div>
    </body>
</html>

