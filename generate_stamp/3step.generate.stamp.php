<script type="text/javascript">
    $(document).ready(function() {
        $('.step3').hide();
    });
</script>
<div class="row pt-5">
    <div class="col-4">

    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4><i class="fa fa-address-card fa-fw" aria-hidden="true"></i> Generate Stamp</h4>
            </div>
            <div class="card-block">
                <div class="step1">
                    <div class="alert alert-warning" role="alert">
                        <strong>Step 1</strong><br> Choose the file that you need to put your stamp.
                    </div>
                    <form method="post"  accept-charset="utf-8" enctype="multipart/form-data">

                        <input type="hidden" name="emp_full" value="<?php echo $fullname; ?>">
                        <input type="hidden" name="emp_fname" id="emp_fname" value="<?php echo $firstname; ?>">
                        <input type="hidden" name="emp_lname" id="emp_lname" value="<?php echo $lastname; ?>">
                        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="emp_dept" id="emp_dept" value="<?php echo $department; ?>">
                        <input type="hidden" name="crtd_date" id="crtd_date" value="<?php echo date("Y/m/d H:m"); ?>">
                        <input type="hidden" name="ip_address" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                        <input type="file"  class="col-12 btn btn-secondary regi" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.wordprocessingml.document, .pdf" required>

                        <button type="submit" class="btn btn-success col-12 mt-3" name="regi_file">Register File</button>

                    </form>
                </div>

                <?php

                    require_once 'function/generate.php';

                    if(!empty($ds_no)){

                ?>
                <script>
                    $(document).ready(function(){
                        $('.step1').hide('slow');
                    });

                    if (document.addEventListener) { // IE >= 9; other browsers
                        document.addEventListener('contextmenu', function(e) {
                            alert("please copy the stamp, after 5seconds it will disappear "); //here you draw your own menu
                            //e.preventDefault();
                            //$('.step2').hide('slow');
                            setTimeout(function() {
                                $('.step2').hide(),
                                $('.step3').show();
                            }, 5000);

                        }, false);
                    } else { // IE < 9
                        document.attachEvent('oncontextmenu', function() {
                            //alert("You've tried to open context menu");
                            window.event.returnValue = false;
                        });
                    }
                </script>
                <div class="step2">
                    <div class="alert alert-info" role="alert">
                        <strong>Step 2</strong><br> Right click and Copy the stamp and paste it on your registered file then save.
                    </div>
                    <div class="row">

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
                </div>
                <?php
                 }


                ?>
                <div class="step3">
                    <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="hidden" name="ds_no" id="ds_no" value="<?php echo $ds_no;?>">
                        <div class="alert alert-warning" role="alert">
                            <strong>Step 3</strong><br> Choose your stamped file.
                        </div>

                        <input type="file"  class="col-12 btn btn-secondary upl" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.wordprocessingml.document, .pdf" required>
                        <button type="submit" class="btn btn-success col-12 mt-3" name="upload_file">Upload</button>
                    </form>
                </div>

                <?php

                    require_once 'function/validation.php';

                    if(!empty($validation) ){

                        if($validation == "Valid"){

                ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.step1').hide('slow');
                        $('.step2').hide('slow');
                        $('.step3').hide('slow');

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

                        $('.invalid').show();
                    });
                </script>
                <div class="invalid">

                    <div class="alert alert-danger" role="alert">
                        <strong>Result</strong><br> Your uploaded file is not valid, please validate again your registered file with attachement of your generated stamp.
                        <?php
                            if($size_movement == "inc"){
                                echo "Make sure that the you only add the stamp or else register again new one with your add text";
                            }elseif ($size_movement == "dec") {
                                echo "Make sure that the you add the stamp and did not remove some text or else register again";
                            }
                        ?>
                        <button type="submit" class="btn btn-danger" onclick="window.location.href=window.location.href">OK</button>
                    </div>

                </div>

                <?php

                    }
                }

                ?>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-4">

    </div>
</div>
