
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Happy Farm</title>
<style type="text/css">

#frame {
position: absolute;
top: 20%; 
left: 25%; 
width: 960px; 
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
<img id="success" src="img\success.jpg" />
</div>
<?php
    header("Refresh: 3; url=login.html");
?>
</body>
</html>