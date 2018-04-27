<?php
require_once 'function/validation.php';
?>
<script>
    function getvalue(val) {
        
       //alert(val);
        //$("#label").val(val);
        
        $.ajax({
            type: "GET",
            url: 'function/generate.php',
            data: {
                ds_id: val },
            success: function(data){
                var ds_val = jQuery.parseJSON(data);
                //var ds_val = data
                //alert(ds_val);
                $("#get_ds_no").val(ds_val[0]);
                
                // kunin na lang DS reference no kesa full info pa lol
            }
        });
    }

</script>


<div class="modal fade bd-example-modal-lg" id="test-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h5>Document Validation</h5>
                </div>
                <div class="card-block"> 
                    <div class="row">
                        
                        <div class="col-3"></div>
                        <div class="col-6">
                            <input type="hidden" name="ds_no_vali" id="get_ds_no" >
                            <input type="file"  class="col-12 btn btn-secondary upl" name="file_vali" required>
                        </div>
                    </div>
                    <div name="remarks" class="row">
                        
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2"></div>
                        <button type="submit" class="btn btn-success col-3" name="upload_file">Validate</button>
                        <div class="col-2"></div>
                        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>