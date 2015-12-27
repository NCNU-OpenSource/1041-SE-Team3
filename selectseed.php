<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=(int)$_GET['glid'];
$_SESSION['glid']=$lid;
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
#warehouse{
    position: absolute;
    top: 20px;
    left: 700px;
}
#exit{
    position: absolute;
    width: 5%;
    height: 10%;
    top: 30px;
    left: 270px;
}
#shop{
    position: absolute;
    top: 280px;
    left: 760px;
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
}

</style>
</head>
<body>
<div id="frame">
<img id="farm0" src="img\main.jpg" />

<table> 
  
<?php
    $sql = "select * from warehouse where uid='$id';";
    $results=mysqli_query($conn,$sql);
    
    while ($rs=mysqli_fetch_array($results)) {    
        if($rs['sid']=='tomato'&&$rs['scount']!=0){
            echo "=<td><a href='grow.php?gsid=",$rs['sid'] ,"'><img src=\"img\stomato.png\"></a>",$rs['scount'],"</td>";
        }
        if($rs['sid']=='beetroot'&&$rs['scount']!=0){
            echo "<td><a href='grow.php?gsid=",$rs['sid'] ,"'><img src=\"img\sbeetroot.png\"></a>",$rs['scount'],"</td>";
        }
        if($rs['sid']=='carrot'&&$rs['scount']!=0){
            echo "<td><a href='grow.php?gsid=",$rs['sid'] ,"'><img src=\"img\scarrot.png\"></a>",$rs['scount'],"</td>";
        }
        if($rs['sid']=='eggplant'&&$rs['scount']!=0){
            echo "<td><a href='grow.php?gsid=",$rs['sid'] ,"'><img src=\"img\seggplant.png\"></a>",$rs['scount'],"</td>";
        }
        if($rs['sid']=='yellowbean'&&$rs['scount']!=0){
            echo "<td><a href='grow.php?gsid=",$rs['sid'] ,"'><img src=\"img\syellowbean.png\"></a>",$rs['scount'],"</td";
        }
    }
	
    //印出土地狀態
    $sql1 = "select * from land where uid='$id';";
    $results1=mysqli_query($conn,$sql1);
    //status 0=可種植 1=未解鎖 2=種植中
    while ($rs1=mysqli_fetch_array($results1)) { 
        //land1  
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==0)) //第一塊地且狀態為可種植
            echo "<img id=\"land1\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==2)) //第一塊地且狀態為種植中
            echo "<img id=\"land1\" src=\"img\grow.png\">";
        //land2
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==0)) //第二塊地且狀態為可種植
            echo "<img id=\"land2\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==2)) //第二塊地且狀態為種植中
            echo "<img id=\"land2\" src=\"img\grow.png\">";
        //land3
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==0)) //第三塊地且狀態為可種植
            echo "<img id=\"land3\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==2)) //第三塊地且狀態為種植中
            echo "<img id=\"land3\" src=\"img\grow.png\">";
        //land4
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==0)) //第四塊地且狀態為可種植
            echo "<img id=\"land4\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==2)) //第四塊地且狀態為種植中
            echo "<img id=\"land4\" src=\"img\grow.png\">";
        //land5
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==1)) //第五塊地且狀態為未解鎖
            echo "<img id=\"land5\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==0)) //第五塊地且狀態為可種植
            echo "<img id=\"land5\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==2)) //第五塊地且狀態為種植中
            echo "<img id=\"land5\" src=\"img\grow.png\">";
        //land6
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==1)) //第六塊地且狀態為未解鎖
            echo "<img id=\"land6\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==0)) //第六塊地且狀態為可種植
            echo "<img id=\"land6\" src=\"img\land.png\">";
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==2)) //第六塊地且狀態為種植中
            echo "<img id=\"land6\" src=\"img\grow.png\">";
        //land7
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==1)) //第七塊地且狀態為未解鎖
            echo "<img id=\"land7\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==0)) //第七塊地且狀態為可種植
            echo "<img id=\"land7\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==2)) //第七塊地且狀態為種植中
            echo "<img id=\"land7\" src=\"img\grow.png\">";
    }
 ?>
</table>
<a href="2_warehouse.php"><img id="warehouse" src="img\warehouse.png"></a>
<a href="2_shop.php"><img id="shop" src="img\shop.png"></a>
<a href="0_logout.php"><img id="exit" src="img\exit.png"></a>

</div>
<embed src="music/happy.mp3" autostart="true" hidden="true" loop="true">
</body>
</html>