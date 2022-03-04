<?php
require_once 'restriction.php';
?>
<html>
    <head>
        <title>
            Digital Signature System
        </title>
		<link rel="icon" type="image/ico" href="favicon.ico">
        <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/css/fontawesome-all.css"/>
        <link rel="stylesheet" type="text/css"href="css/basic-needs.css"/>
        <link rel="stylesheet" type="text/css"href="css/jquery.simple-dtpicker.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/jquery.simple-dtpicker.js"></script>
        <script>
            $(function(){
                $('#search_datetime').appendDtpicker({
                        "autodateOnStart": false,
                        "dateFormat": "MM/DD/YYYY",
                        "dateOnly": true,
                        //"minTime":"06:30",
                        //"maxTime":"21:30",
                        "minDate":+5,
                        "allowWdays": [1, 2, 3, 4, 5] // 0: Sun, 1: Mon, 2: Tue, 3: Wed, 4: Thr, 5: Fri, 6: Sat
                    });
            });
        
        </script>
    </head>
    <body>
        
        <div class="container-fluid">
            <nav class="row navbar navbar-toggleable-md red">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="navbar-brand" >
                    <img src="image/pet1.png">
                    Digital Signature System
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <?php
                        require_once 'function/top-nav.php';
                    ?>
                </div>
            </nav>
            
            
            <div class="row pt-5">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-search fa-fw" aria-hidden="true"></i> Search Form</h4>
                        </div>
                        <div class="card-block">
                               
                            <form method="get" >
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"><b>Referrence No. :</b></label>
                                    <input type="text" name="ref_no" class="col-4 form-control text-left">
                                    <div class="col-4">
                                        
                                    </div>
                                </div>
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"><b>Name :</b></label>
                                    <input type="text" name="name" class="col-4 form-control text-left">
                                    <div class="col-4">
                                        
                                    </div>
                                </div>
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"><b>Department :</b></label>
                                    <input type="text" name="department" class="col-4 form-control text-left">
                                    <div class="col-4">
                                    </div>
                                </div>
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"><b>Document Name :</b></label>
                                    <input type="text" name="docu_name" class="col-4 form-control text-left">
                                    <div class="col-4">
                                    </div>
                                </div>
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"><b>Date Created :</b></label>
                                    <input type="text" id="search_datetime" name="search_datetime" class="col-4 form-control text-left">
                                    <div class="col-4">
                                    </div>
                                </div>
                                
                                <div class="row pt-3">   
                                    <label class="col-4 col-form-label text-right"></label>
                                    <button type="submit" class="btn btn-success col-4" name="search">Search</button>
                                </div>
                            </form>
                            <div class="row ">
                                <div class="col-3"></div>
                                <div class="col-6 text-center">
                                    <?php
                                        require_once 'function/function.php';
                                    ?>
                                
                                </div>
                                <div class="col-3"></div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                        
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
            
            <div class="row pt-3 body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-search fa-fw" aria-hidden="true"></i> Search Result</h4>
                        </div>
                        
                        <?php
                                require_once 'function/search-query.php';
                            
                                if(!empty($search_result)){
                    
                                    $_result                = $search_result;
                                    $querylist              = $_result[0];
                                    $querypage              = $_result[1];
                                    $_SESSION['search']     = $_result[2];

                                    $status = "Search Result";
                                    require_once 'function/search-table.php';

                                }
                                //require_once 'function/signedDocu-query.php';
                                
                                //require_once 'function/table.php';
                                
                            ?>
                        
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row navbar navbar-light red content footer">
                <div class="text-center">&copy; all rights reserved 2018</div>
            </div>
        </div>
    </body>
</html>