<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Happy Farm</title>
<style type="text/css">
#frame {
    position: absolute; 
    width: 960px; 
    top: 50%;
    left: 50%;
    margin: -270px 0 0 -480px;
}
#frame img { 
    max-width:100%; 
    width:expression(document.body.clientWidth>document.getElementById("frame").scrollWidth*8/10? "100%": "auto" );
    height:auto;
}

</style>

</head>
<body>
<div id="frame">
<img id="farm0" src="img\logout.jpg" />
</div>
<?php
    //將session清空
    unset($_SESSION['uid']);
    
    echo '<meta http-equiv=REFRESH CONTENT=3;url=index.php>';
?>
<embed src="music/happy.mp3" autostart="true" hidden="true" loop="true">
</body>
</html>
