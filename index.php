<?php
require_once 'restriction.php';

unset($_SESSION['search']);
?>
<html>
    <head>
        <title>
            Digital Signature System
        </title>
		<link rel="icon" type="image/ico" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/css/fontawesome-all.css"/>
        <link rel="stylesheet" type="text/css" href="css/basic-needs.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery.simple-dtpicker.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/jquery.simple-dtpicker.js"></script>
        
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
            <?php
              include 'generate_stamp/3step.generate.stamp.php';
             ?>
            <div class="row pt-5 body">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-file fa-fw" aria-hidden="true"></i> My Signed Document List</h4>
                        </div>

                        <?php

                        require_once 'function/validation-form.php';

                        require_once 'function/signedDocu-query.php';

                        require_once 'function/table.php';

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
