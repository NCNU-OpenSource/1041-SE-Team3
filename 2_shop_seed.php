<?php
include"config.php";
$id=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="jQuery/jquery.dbpas.carousel.shop.css" />
<script src="jQuery/jquery.dbpas.carousel.js"></script>
<title>Happy Farm</title>

<script>
      $(document).ready(function() {
         $('#seedlist').dbpasCarousel({
            itemsVisible:2,
            autoSlide: 1});
        });
</script>



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
    top: 99px;
    left: 65px;
    font-weight: bold;
    font-family:  Arimo;
	color:white;
    font-size:25px;
}
#energy{
    position: absolute;
    top: 99px;
    left: 155px;
    font-weight: bold;
    font-family:  Arimo;
	color:#2E9AFE;
    font-size:25px;
}
#land{
    position: absolute;
    top: 99px;
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
#buyseed{
    background-color: white;
    position: absolute;
    width: 700px;
    height: 300px;
    top: 170px;
    left: 130px;
    border-radius:10px;
    z-index:1;
}

</style>
</head>

<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\shop_seed.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png"/></a>
<a href="2_shop_seed.php"><p id="seed">種子</p></a>
<a href="2_shop_energy.php" ><p id="energy">體力</p></a>
<a href="2_shop_land.php" ><p id="land">土地</p></a>

<div id="buyseed">
<ul id="seedlist">
  
<?php

    //選種子
    $sql = "select * from warehouse where uid='$id';";
    $results=mysqli_query($conn,$sql);
    
    while ($rs=mysqli_fetch_array($results)) {    
        if($rs['sid']=='tomato'){
            echo "<li><a href='shop_alert.php?bsid=",$rs['sid'] ,"'><img src=\"img\buytomato.png\"  style=\"width:300px; height:300px;\" ></a></li>";
        }
        if($rs['sid']=='beetroot'){
            echo "<li><a href='shop_alert.php?bsid=",$rs['sid'] ,"'><img src=\"img\buybeetroot.png\"  style=\"width:300px; height:300px;\" ></a></li>";        }
        if($rs['sid']=='carrot'){
            echo "<li><a href='shop_alert.php?bsid=",$rs['sid'] ,"'><img src=\"img\buycarrot.png\"  style=\"width:300px; height:300px;\" ></a></li>";        }
        if($rs['sid']=='eggplant'){
            echo "<li><a href='shop_alert.php?bsid=",$rs['sid'] ,"'><img src=\"img\buyeggplant.png\"  style=\"width:300px; height:300px;\" ></a></li>";        }
        if($rs['sid']=='yellowbean'){
            echo "<li><a href='shop_alert.php?bsid=",$rs['sid'] ,"'><img src=\"img\buyyellowbean.png\"  style=\"width:300px; height:300px;\" ></a></li>";        }
    }
?>
</ul>
</div>

</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>