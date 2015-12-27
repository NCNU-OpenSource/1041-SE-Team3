<?php
include"config.php";
$id=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript" src="jQuery/jquery.cycle.lite.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Happy Farm</title>
<script type="text/javascript">
    jQuery(document).ready(function($) {   
        $('#slider').cycle({   
            fx:    'fade',  
            timeout:  5000,
            random:  1
        });
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
table { 
    position: absolute;
    border:0; 
    border-collpase:collpase; 
    width:250px; 
    top:10px;
    left: 0px;
    font-weight: bold;
    font-family:  Arimo;
    font-size:20px;
}
#exit{
    position: absolute;
    width: 5%;
    height: 10%;
    top: 30px;
    left: 310px;
}
#warehouse{
    position: absolute;
    top: 20px;
    left: 700px;
}
#shop{
    position: absolute;
    top: 280px;
    left: 760px;
}
#skip{
    position: absolute;
    top: 360px;
    left: 550px;
}
#land1{
    position: absolute;
    top: 240px;
    left: 220px;
}
#land2{
    position: absolute;
    top: 360px;
    left: 220px;
}
#land3{
    position: absolute;
    top: 240px;
    left: 340px;
}
#land4{
    position: absolute;
    top: 360px;
    left: 340px;
}
#land5{
    position: absolute;
    top: 240px;
    left: 460px;
}
#land6{
    position: absolute;
    top: 360px;
    left: 460px;
}
#land7{
    position: absolute;
    top: 240px;
    left: 580px;
}
#slider{
    position: absolute;
	clear: both;
	width: 600px;
	padding: 0;
	margin: 0 auto;
	z-index: 0;
	clear: both;
	display: block;
	top: 150px;
	left: 220px;
}

.show1{
	position: absolute;
	background: url("img/t1.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}
.show2{
	position: absolute;
	background: url("img/t2.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}.show3{
	position: absolute;
	background: url("img/t3.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}.show4{
	position: absolute;
	background: url("img/t4.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}.show5{
	position: absolute;
	background: url("img/t5.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}.show6{
	position: absolute;
	background: url("img/t6.png") no-repeat scroll 0 0 transparent;
	padding: 0;
	height: 220px;
	width: 600px;
	top: 0;
	left: 0;
}
.progress1{
    position: absolute;
    width: 100px;
    height: 20px;
    top: 40px;
    left: 190px;
}
.progress2{
    position: absolute;
    width: 100px;
    height: 20px;
    top: 70px;
    left: 190px;
}
}

</style>
</head>
<body>
<div id="frame">
<img id="farm0" src="img\main.jpg" />

<table> 
  
<?php
    //1.印出玩家資訊
    $sql = "select * from user where uid='$id';";
    $results=mysqli_query($conn,$sql);
    
    //1.1玩家等級顯示圖片
    while ($rs=mysqli_fetch_array($results)) {    
        if($rs['ulevel']==1){
            echo "<tr><td rowspan='3'><img src=\"img\lv1.png\"></td>";
        }
        $process = 100*($rs['uexp']/(100*$rs['ulevel']));
        $engprocess = 10*$rs['uenergy'];

        echo "<td>" , $rs['uname'] ,
             "</td><td>" , "<font color='#5E610B';>$</font>",$rs['umoney'],
             "</td></tr>" ,
             "<tr><td>" ,"<font color='#0489B1';>Exp</font>",
             "</td><td>"," ",
             "</td></tr>",
             "<tr><td>" ,"<font color='RED';>Energy</font>",
             "</td><td>"," ",
             "</td></tr>";

        echo "<div class=\"progress1\">",
             "<div class=\"progress\">",
             "<div class=\"progress-bar progress-bar-info progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"$process\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$process%;\">",
             $rs['uexp']," / ",100*$rs['ulevel'],"</div></div></div>";

        echo "<div class=\"progress2\">",
             "<div class=\"progress\">",
             "<div class=\"progress-bar progress-bar-danger progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"$engprocess\" aria-valuemin=\"0\" aria-valuemax=\"10\" style=\"width:$engprocess%; \">",
             $rs['uenergy']," / ","10","</div></div></div>";
    }

    //印出土地狀態
    $sql1 = "select * from land where uid='$id';";
    $results1=mysqli_query($conn,$sql1);
    //status 0=可種植 1=未解鎖 2=種植中
    while ($rs1=mysqli_fetch_array($results1)) { 
        //land1  
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==0)) //第一塊地且狀態為可種植
            echo "<img id=\"land1\" src=\"img\land.png\">";
        //land2
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==0)) //第二塊地且狀態為可種植
            echo "<img id=\"land2\" src=\"img\land.png\">";
        //land3
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==0)) //第三塊地且狀態為可種植
            echo "<img id=\"land3\" src=\"img\land.png\">";
        //land4
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==0)) //第四塊地且狀態為可種植
            echo "<img id=\"land4\" src=\"img\land.png\">";
        //land5
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==1)) //第五塊地且狀態為未解鎖
            echo "<img id=\"land5\" src=\"img\gland.png\">";
        //land6
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==1)) //第六塊地且狀態為未解鎖
            echo "<img id=\"land6\" src=\"img\gland.png\">";
        //land7
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==1)) //第七塊地且狀態為未解鎖
            echo "<img id=\"land7\" src=\"img\gland.png\">";

    }
    
    $sql1 = "UPDATE user SET ucount=(ucount+1) WHERE uid='$id' ;";
	mysqli_query($conn,$sql1) or die("MySQL update message error"); 
 ?>
</table>
<img id="warehouse" src="img\warehouse.png">
<img id="shop" src="img\shop.png">
<a href="1_main.php"><img id="skip" src="img\skip.png"></a>
<a href="0_logout.php"><img id="exit" src="img\exit.png"></a>


<div id="slider">
    <div class="show1"></div>
    <div class="show2"></div>
    <div class="show3"></div>
    <div class="show4"></div>
    <div class="show5"></div>
    <div class="show6"></div>
</div>
<embed src="music/happy.mp3" autostart="true" hidden="true" loop="true">

</div>
</body>
</html>