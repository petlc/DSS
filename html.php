<html>
    <head>
        <title></title>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#circleWH").change(function(){
                    var nm = $("#name").val();
                    var nmx = $("#fontx").val();
                    var nmy = $("#fonty").val();
                    var fnt = $("#font").val();
                    var val3 = $("#circleWH").val();
                    
                    $.ajax({
                        type: "GET",
                        url: 'html1.php',
                        data: {width: val3, height: val3, name: nm, name_f: fnt, name_x: nmx, name_y: nmy},
                        success: function(data){
                            //alert(data);
                            $(".p").html(data);
                            $(".p1").html(val3);
                            $(".p2").html(val3);
                            $(".f").html(fnt);
                            $(".fx").html(nmx);
                            $(".fy").html(nmy);
                        }
                    });
                });
                
                $("#name").change(function(){
                    var nm = $("#name").val();
                    var nmx = $("#fontx").val();
                    var nmy = $("#fonty").val();
                    var fnt = $("#font").val();
                    var val3 = $("#circleWH").val();
                    
                    $.ajax({
                        type: "GET",
                        url: 'html1.php',
                        data: {width: val3, height: val3, name: nm, name_f: fnt, name_x: nmx, name_y: nmy},
                        success: function(data){
                            //alert(data);
                            $(".p").html(data);
                            $(".p1").html(val3);
                            $(".p2").html(val3);
                            $(".f").html(fnt);
                            $(".fx").html(nmx);
                            $(".fy").html(nmy);
                        }
                    });
                });
                
                $("#fontx").change(function(){
                    var nm = $("#name").val();
                    var nmx = $("#fontx").val();
                    var nmy = $("#fonty").val();
                    var fnt = $("#font").val();
                    var val3 = $("#circleWH").val();
                    
                    $.ajax({
                        type: "GET",
                        url: 'html1.php',
                        data: {width: val3, height: val3, name: nm, name_f: fnt, name_x: nmx, name_y: nmy},
                        success: function(data){
                            //alert(data);
                            $(".p").html(data);
                            $(".p1").html(val3);
                            $(".p2").html(val3);
                            $(".f").html(fnt);
                            $(".fx").html(nmx);
                            $(".fy").html(nmy);
                        }
                    });
                });
                
                $("#fonty").change(function(){
                    var nm = $("#name").val();
                    var nmx = $("#fontx").val();
                    var nmy = $("#fonty").val();
                    var fnt = $("#font").val();
                    var val3 = $("#circleWH").val();
                    
                    $.ajax({
                        type: "GET",
                        url: 'html1.php',
                        data: {width: val3, height: val3, name: nm, name_f: fnt, name_x: nmx, name_y: nmy},
                        success: function(data){
                            //alert(data);
                            $(".p").html(data);
                            $(".p1").html(val3);
                            $(".p2").html(val3);
                            $(".f").html(fnt);
                            $(".fx").html(nmx);
                            $(".fy").html(nmy);
                        }
                    });
                });
                
                $("#font").change(function(){
                    var nm = $("#name").val();
                    var nmx = $("#fontx").val();
                    var nmy = $("#fonty").val();
                    var fnt = $("#font").val();
                    var val3 = $("#circleWH").val();
                    
                    $.ajax({
                        type: "GET",
                        url: 'html1.php',
                        data: {width: val3, height: val3, name: nm, name_f: fnt, name_x: nmx, name_y: nmy},
                        success: function(data){
                            //alert(data);
                            $(".p").html(data);
                            $(".p1").html(val3);
                            $(".p2").html(val3);
                            $(".f").html(fnt);
                            $(".fx").html(nmx);
                            $(".fy").html(nmy);
                        }
                    });
                });
                
            });
            
            
        </script>
    </head>
    <body>
        
        <input type="text" id="name"><br>
        <label>Font :</label><input type="range" min="8" max="16" value="8" name="font" id="font"><p class="f"></p><br>
        <label>Font x:</label><input type="range" min="18" max="35" name="fontx" value="28" id="fontx"><p class="fx"></p><br>
        <label>Font y:</label><input type="range" min="80" max="108" name="fonty" value="98" id="fonty"><p class="fy"></p><br>
        <label>Circle</label><br>
        <label>Height</label><p class="p1"></p>
        <label>Width</label><p class="p2"></p>
        <input type="range" min="80" max="110" step="any" value="80" class="slider" id="circleWH">
        <p class="p"></p>
    </body>
</html>