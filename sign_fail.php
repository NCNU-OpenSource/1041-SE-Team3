
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
    heitht:auto;
}

}
</style>
</head>
<body>
<div id="frame">
<img id="fail" src="img\fail.jpg" />
</div>
<?php
    header("Refresh: 3;  url=signup.html");
?>
</body>
</html>