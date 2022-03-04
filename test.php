<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" /> <!-- reset css -->
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<style>
    body{ background-color: ivory; }
    canvas{border:1px solid red;}
</style>

<script>
$(function(){

    var canvas=document.getElementById("canvas");
    var ctx=canvas.getContext("2d");

    ctx.fillRect(50,50,150,75);


    var theImage=document.getElementById("toImage");
    theImage.src=canvas.toDataURL();

}); // end $(function(){});
</script>

</head>

<body>
    <canvas id="canvas" width=300 height=300></canvas>
    <img id="toImage" width=300 height=300>
</body>
</html>