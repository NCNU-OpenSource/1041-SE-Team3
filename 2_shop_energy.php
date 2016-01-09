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
    color:white;
    font-size:25px;
}
#land{
    position: absolute;
    top: 77px;
    left: 255px;
    font-weight: bold;
    font-family:  Arimo;
    color:#2E9AFE;
    font-size:25px;
}
#cancel{
    position: absolute;
    top: 30px;
    left: 860px;
}
#food1{
    position: absolute;
    top: 170px;
    left: 30px;
}
#food2{
    position: absolute;
    top: 170px;
    left: 210px;
}
#food3{
    position: absolute;
    top: 170px;
    left: 390px;
}
#food4{
    position: absolute;
    top: 170px;
    left: 570px;
}
#food5{
    position: absolute;
    top: 170px;
    left: 750px;
}
#buybutton1{
    position: absolute;
    top: 420px;
    left: 80px;
    width: 80px;
    height: 50px;
}
#buybutton2{
    position: absolute;
    top: 420px;
    left: 260px;
    width: 80px;
    height: 50px;
}
#buybutton3{
    position: absolute;
    top: 420px;
    left: 440px;
    width: 80px;
    height: 50px;
}
#buybutton4{
    position: absolute;
    top: 420px;
    left: 620px;
    width: 80px;
    height: 50px;
}
#buybutton5{
    position: absolute;
    top: 420px;
    left: 800px;
    width: 80px;
    height: 50px;
}
</style>
</head>
<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\shop_eng.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png"/></a>
<a href="2_shop_seed.php"><p id="seed">種子</p></a>
<a href="2_shop_energy.php" ><p id="energy">體力</p></a>
<a href="2_shop_land.php" ><p id="land">土地</p></a>
<!--食物列表-->
<img id="food1" src="img\food1.png" />
<img id="food2" src="img\food2.png" />
<img id="food3" src="img\food3.png" />
<img id="food4" src="img\food4.png" />
<img id="food5" src="img\food5.png" />


<a href="shopfood_alert.php?a=1"><img id="buybutton1" src="img\buyfood.png"></a>
<a href="shopfood_alert.php?a=2"><img id="buybutton2" src="img\buyfood.png"></a>
<a href="shopfood_alert.php?a=3"><img id="buybutton3" src="img\buyfood.png"></a>
<a href="shopfood_alert.php?a=4"><img id="buybutton4" src="img\buyfood.png"></a>
<a href="shopfood_alert.php?a=5"><img id="buybutton5" src="img\buyfood.png"></a>


</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>

