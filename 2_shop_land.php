<?php
include"config.php";
$id=$_SESSION['uid'];
?>
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
#menu{
    position: absolute;
    width:900px;
    top: 20px;
    left: 30px;
}
#seed{
    position: absolute;
    top: 77px;
    left: 60px;
    font-weight: bold;
    font-family:  Arimo;
    color:#2E9AFE;
    font-size:25px;
}
#energy{
    position: absolute;
    top: 77px;
    left: 155px;
    font-weight: bold;
    font-family:  Arimo;
    color:#2E9AFE;
    font-size:25px;
}
#land{
    position: absolute;
    top: 77px;
    left: 255px;
    font-weight: bold;
    font-family:  Arimo;
    color:white;
    font-size:25px;
}
#cancel{
    position: absolute;
    top: 30px;
    left: 860px;
}
#buybutton{
    position: absolute;
    top: 390px;
    left: 435px;
    width: 80px;
    height: 50px;
}

</style>
</head>
<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\shop_land.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png"/></a>
<a href="2_shop_seed.php"><p id="seed">種子</p></a>
<a href="2_shop_energy.php" ><p id="energy">體力</p></a>
<a href="2_shop_land.php" ><p id="land">土地</p></a>
<a href="shopland_alert.php"><img id="buybutton" src="img\buyland.png"></a>

</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>

