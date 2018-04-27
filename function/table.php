<div class="card-block">
    <?php
    $requestlist_query = $dbCon->prepare($querylist);
    $requestlist_query->execute();
    
    if($requestlist_query->rowCount() > 0){
        
        
    ?>
    <table class="table table-bordered cf">
        <thead>
            <tr>
                <th>Reference No.</th>
                <th>Document Name</th>
                <th>Date Created</th>
                <th>Ip Address</th>
                <th>Validation</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row=$requestlist_query->FETCH(PDO::FETCH_ASSOC)){
                    $ds_crtr = $row['ds_crtr'];
                    $ds_id   = $row['ds_info_id'];
                    $ds_no   = $row['ds_no'];
            ?>
            <tr>
                <td>
                    <?php echo $ds_no ?></a>
                </td>
                <td>
                    <?php echo $row['ds_docu_name']; ?>
                </td>
                <td>
                    <?php echo $row['ds_crtd_date']; ?>
                </td>
                <td>
                    <?php echo $row['ds_ip_address']; ?>
                </td>
                <td>
                    <?php 
                    
                        $file_validation = $row['ds_file_validation'];
                    
                        if($file_validation == "Invalid"){
                            
                            if($ds_crtr == $fullname){
                                
                            echo "<strong onclick='getvalue(".$ds_id.")'><a class='text-danger' toggle='popover' data-placement='bottom' data-toggle='modal' data-target='#test-form' role='button' >".$file_validation."</a></strong>";
                                
                                
                                
                            }else{
                                
                                echo "<strong class='text-danger'>".$file_validation."</striong>";
                                
                            }
                        }elseif($file_validation == "For Validation"){
                            if($ds_crtr == $fullname){
                                
                                echo "<strong onclick='getvalue(".$ds_id.")'><a class='text-warning' toggle='popover' data-placement='bottom' data-toggle='modal' data-target='#test-form' role='button'>".$file_validation."</a></strong>";
                                
                            }else{
                                
                                echo "<strong class='text-warning'>".$file_validation."</striong>";
                                
                            }
                        }else{
                            if($ds_crtr == $fullname){
                                
                                echo "<strong><a class='text-success' href='#'>".$file_validation."</a></striong>";
                                
                            }else{
                                
                                echo "<strong class='text-success'>".$file_validation."</striong>";
                                
                            }
                        }
                    
                    //echo $row['ds_file_validation']; 
                    
                    ?>
                </td>
            </tr>
            <?php
        }
    }else{                            
        echo "0 result";
    }
            ?>
        </tbody>
    </table>                
            
    <div class="">
        <ul class="pagination justify-content-center">
            <?php            
            $requestpage_query = $dbCon->prepare($querypage);
            $requestpage_query->execute();
            //echo $requestpage_query->rowCount();
            $requestrows = $requestpage_query->rowCount();                
            $requestpages = ceil($requestrows/$limit);

            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                // cast var as int
                $currentpage = (int) $_GET['id'];
            } else {
                // default page num
                $currentpage = 1;
            }

            if ($currentpage > 3) {
                // show << link to go back to page 1
                print'<li class="page-item">';
                echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?id=1'><<</a> ";
                print'</li>';
                // get previous page num
                if($currentpage >= 11 ){
                    $prevpage = $currentpage - 10;
                    // show < link to go back to 1 page
                    echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$prevpage'>$prevpage</a> ";
                    echo " <a class='page-link'>...</a> ";
                }
            }

            if ($currentpage > 1) {
                $prevpage = $currentpage - 1;
                print'<li class="page-item">';
                print"<a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$prevpage'>previous</a>";
                print'</li>';
                //echo " <a href='{$_SERVER['PHP_SELF']}?id=$prevpage'>previous</a> ";
                $onleft = "{$_SERVER['PHP_SELF']}?id=$prevpage";
            }else{
                $onleft = " ";
            }  //echo " <a>...</a> ";

            $range = 2;

            // loop to show links to range of pages around current page
            for ($x = ($currentpage - $range); $x < (($currentpage + $range)  + 1); $x++) {
                        // if it's a valid page number...
                print'<li class="page-item">';
                if (($x > 0) && ($x <= $requestpages)) {
                    // if we're on current page...
                    if ($x == $currentpage) {
                        // 'highlight' it but don't make a link
                        echo " <b class='page-link bg-success'>$x</b> ";
                        // if not current page...
                    } else {
                        // make it a link
                        echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$x'>$x</a> ";
                    } // end else
                } // end if 
                print'</li>';
            } // end for            
            if ($currentpage != $requestpages) {
                $nextpage = $currentpage + 1;
                if($requestpages != 0){
                    print'<li class="page-item">';
                    print"<a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$nextpage'>Next</a>";
                    print'</li>';
                    //echo " <a href='{$_SERVER['PHP_SELF']}?id=$nextpage'>next</a> ";
                    $onright = "{$_SERVER['PHP_SELF']}?id=$nextpage";
                }else{
                    $onright = " ";
                }									
            }else{
                $onright = " ";
            }
            if (($requestpages - $currentpage) > 2) {
                if($requestpages > 11 ){
                    // get next page
                    $nextpage = $currentpage + 10;
                    // echo forward link for next page
                    
                    if($nextpage > $requestpages){

                    }else{

                        echo " <a class='page-link'>...</a> "; 
                        print'<li class="page-item">';
                        echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$nextpage'> $nextpage</a> ";
                        print'</li>'; 
                    }

                }
                // echo forward link for lastpage
                print'<li class="page-item">';
                echo " <a class='page-link' href='{$_SERVER['PHP_SELF']}?id=$requestpages'>>></a> ";
                print'</li">';
            } // end if
                    /****** end build pagination links ******/
            ?>
        </ul>
    </div>                
</div>