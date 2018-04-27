<script>
    $(document).ready(function(){
        $('.step2').hide();
        $('.step4').hide();
        $('.step5').hide();
        $('.stamp').hide();
        $('.regi').val('');


        $('.regi').change(function () {

            $file = $('.regi').val();

            if($file === ""){

            }else{

                //alert($file);
                $('.step2').show();
                $('.step1').hide();

            }
        });

        $('.upl').change(function () {

            $file = $('.upl').val();

            if($file === ""){

            }else{

                //alert($file);
                $('.step5').show();
                $('.step4').hide();

            }
        });

    });
</script>
<div class="row pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 onclick="$('.stamp').toggle();" ><i class="fa fa-address-card fa-fw" aria-hidden="true"></i> Generate Stamp</h4>
            </div>
            <div class="card-block stamp">
                <div class="row">
                    <!---
                    <div class="col-3">
                        <div class="row">
                            <label class="col-4 col-form-label text-right"><b>Name :</b></label>
                            <label class="col-8 col-form-label text-left"><?php echo $fullname; ?></label>
                        </div>
                        <div class="row">
                            <label class="col-4 col-form-label text-right"><b>ID :</b></label>
                            <label class="col-8 col-form-label text-left"><?php echo $id; ?></label>
                        </div>
                        <div class="row">
                            <label class="col-4 col-form-label text-right"><b>Department :</b></label>
                            <label class="col-8 col-form-label text-left"><?php echo $department; ?></label>
                        </div>
                        <div class="row">
                            <label class="col-4 col-form-label text-right"><b>Date Time :</b></label>
                            <label class="col-8 col-form-label text-left"><?php echo date("Y-m-d H:m"); ?></label>
                        </div>
                        <div class="row">
                            <label class="col-4 col-form-label text-right"><b>Ip Address :</b></label>
                            <label class="col-8 col-form-label text-left"><?php echo $_SERVER['REMOTE_ADDR']; ?></label>
                        </div>
                    </div>
                    -->
                    <div class="col-4 ">

                    </div>

                    <div class="col-4">
                        <div class="alert alert-warning step1" role="alert">
                          <strong>Step 1</strong><br> Choose the file that you need your stamp.
                        </div>
                        <form method="post"  accept-charset="utf-8" enctype="multipart/form-data">

                            <div class="step1">

                                <input type="hidden" name="emp_full" value="<?php echo $fullname; ?>">
                                <input type="hidden" name="emp_fname" id="emp_fname" value="<?php echo $firstname; ?>">
                                <input type="hidden" name="emp_lname" id="emp_lname" value="<?php echo $lastname; ?>">
                                <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="emp_dept" id="emp_dept" value="<?php echo $department; ?>">
                                <input type="hidden" name="crtd_date" id="crtd_date" value="<?php echo date("Y/m/d H:m"); ?>">
                                <input type="hidden" name="ip_address" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                <input type="file"  class="col-12 btn btn-secondary regi" name="file" required>

                            </div>

                            <div class="step2">
                                <div class="alert alert-success col-12" role="alert">
                                  <strong>Step 2</strong><br> Click to register.
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success" name="regi_file">Register File</button>
                                </div>
                            </div>
                        </form>

                        <!--- --->

                        <?php

                            require_once 'function/generate.php';

                            if(!empty($ds_no)){

                        ?>
                        <script>
                            $(document).ready(function(){
                                $('.step1').hide('slow');
                                $('.step2').hide('slow');
                                $('.stamp').show();
                            });

                            if (document.addEventListener) { // IE >= 9; other browsers
                                document.addEventListener('contextmenu', function(e) {
                                    alert("please copy the stamp, after 5seconds it will disappear "); //here you draw your own menu
                                    //e.preventDefault();
                                    //$('.step2').hide('slow');
                                    setTimeout(function() {
                                        $('.step3').hide(),
                                        $('.step4').show();
                                    }, 5000);

                                }, false);
                            } else { // IE < 9
                                document.attachEvent('oncontextmenu', function() {
                                    //alert("You've tried to open context menu");
                                    window.event.returnValue = false;
                                });
                            }
                        </script>
                        <div class="alert alert-info step3" role="alert">
                            <strong>Step 3</strong><br> Copy the stamp and paste it on your registered file then save.
                        </div>
                        <div class="row step3">

                            <div class="col-12 text-center">

                                <input type="hidden" name="ds_no" id="ds_no" value="<?php echo $ds_no;?>">

                                <input type="hidden" name="settings_set" id="settings_set" value="<?php echo $settings;?>">
                                <input type="hidden" id="radius" value="<?php echo $row['radius'];?>">
                                <input type="hidden" name="settings_set" id="settings_set" value="<?php echo $row['dept_font_s'];?>">
                                <input type="hidden" id="dept_font_size" value="<?php echo $row['dept_font_s'];?>">
                                <input type="hidden" id="dept_font_posX" value="<?php echo $row['dept_font_x'];?>">
                                <input type="hidden" id="dept_font_posY" value="<?php echo $row['dept_font_y'];?>">

                                <input type="hidden" id="name_font_size" value="<?php echo $row['name_font_s'];?>">
                                <input type="hidden" id="name_font_posX" value="<?php echo $row['name_font_x'];?>">
                                <input type="hidden" id="name_font_posY" value="<?php echo $row['name_font_y'];?>">

                                <input type="hidden" name="ds_no" id="ds_no" value="<?php echo $ds_no; ?>">

                                <input type="hidden" class="col-form-label" name="auto_resize" id="auto_resize" value="auto_resize">
                                <div class="row">

                                </div>

                                <script src="js/stamp.js"></script>
                                <p class="pCircle"></p>

                            </div>

                        </div>
                        <?php
                         }


                        ?>

                        <!--- --->

                        <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="step4">
                                <input type="hidden" name="ds_no" id="ds_no" value="<?php echo $ds_no;?>">
                                <div class="alert alert-warning" role="alert">
                                    <strong>Step 4</strong><br> Choose your stamped file.
                                </div>

                                <input type="file"  class="col-12 btn btn-secondary upl" name="file" required>

                            </div>
                            <div class="step5">

                                <div class="alert alert-success" role="alert">
                                    <strong>Step 5</strong><br> Click to upload validation.
                                </div>

                                <div class="row pt-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success" name="upload_file">Upload</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <?php

                            require_once 'function/validation.php';

                            if(!empty($validation) ){

                                if($validation == "Valid"){

                        ?>
                                    <script>
                                        $(document).ready(function(){
                                            $('.step1').hide('slow');
                                            $('.step2').hide('slow');
                                            $('.step3').hide('slow');
                                            $('.step4').hide('slow');
                                            $('.step5').hide('slow');
                                            $('.stamp').show();
                                            $('.valid').show();
                                        });
                                    </script>
                                    <div class="valid">

                                        <div class="alert alert-success" role="alert">
                                            <strong>Result</strong><br> Your uploaded file is valid, Thank you.
                                        <button type="submit" class="btn btn-success" onclick="window.location.href=window.location.href">OK</button>
                                        </div>

                                    </div>
                        <?php
                                }else{

                                   ?>

                            <script>
                                $(document).ready(function(){
                                    $('.step1').hide('slow');
                                    $('.step2').hide('slow');
                                    $('.step3').hide('slow');
                                    $('.step4').hide('slow');
                                    $('.step5').hide('slow');
                                    $('.stamp').show();
                                    $('.notvalid').show();
                                });
                            </script>
                                <div class="notvalid">

                                    <div class="alert alert-danger" role="alert">
                                        <strong>Result</strong><br> Your uploaded file is not valid, please validate again your registered file with attachement of your generated stamp.
                                        <button type="submit" class="btn btn-danger" onclick="window.location.href=window.location.href">OK</button>
                                    </div>

                                </div>

                            <?php
                                }

                            }else{

                            }
                        ?>

                    </div>

                    <div class="col-4">

                    </div>

                </div>



            </div>
            <div class="card-footer">

            </div>
        </div>


    </div>
</div>
