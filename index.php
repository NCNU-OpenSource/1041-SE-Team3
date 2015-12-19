<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
#gamestart{
    position: absolute;
    top:415px;
    left: 385px;
}
</style>

</head>
<body>
<div id="frame">
<img id="farm0" src="img\farm0.jpg" />
<a href="0_chooselogin.php"><img id="gamestart" src="img\gamestart.png"></a>

<!--改用按鈕的方式
<button type="button" value="gamestart" onclick="location.href='要前往的網頁連結'">
<img src="gamestart.png">
</button>-->

</div>
<embed src="music/happy.mp3" autostart="true" hidden="true" loop="true">
</body>
</html>