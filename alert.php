<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=$_SESSION['glid'];
$sid=$_GET['gsid'];
$_SESSION['gsid']=$sid;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
    width:230px; 
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
    left: 310px;
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


#alert{
    position: absolute;
    top: 120px;
    left: 230px;
    width: 500px;
    background-color: #FACC2E;
    height: 200px;
    border-radius:10px;
    font-family: Microsoft JhengHei;
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
            if($rs['ulevel']==2){
                echo "<tr><td rowspan='3'><img src=\"img\lv2.png\"></td>";
            }
            if($rs['ulevel']==3){
                echo "<tr><td rowspan='3'><img src=\"img\lv3.png\"></td>";
            }
            if($rs['ulevel']==4){
                echo "<tr><td rowspan='3'><img src=\"img\lv4.png\"></td>";
            }
            if($rs['ulevel']==5){
                echo "<tr><td rowspan='3'><img src=\"img\lv5.png\"></td>";
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
                "<div class=\"progress-bar progress-bar-danger progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"$engprocess\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:$engprocess%; \">",
                $rs['uenergy']," / ","10","</div></div></div>";

        }

    ?>
</table>

<table id="table1"> 
  
<?php


    
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
		if(($rs1['lid']%7==1)&&($rs1['lstatus']==3)) //第一塊地且狀態為種植完成
            echo "<img id=\"land1\" src=\"img\p",$rs1['sid'],".png\">";
        //land2
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==0)) //第二塊地且狀態為可種植
            echo "<img id=\"land2\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==2)) //第二塊地且狀態為種植中
            echo "<img id=\"land2\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==2)&&($rs1['lstatus']==3)) //第二塊地且狀態為種植完成
            echo "<img id=\"land2\" src=\"img\p",$rs1['sid'],".png\">";
        //land3
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==0)) //第三塊地且狀態為可種植
            echo "<img id=\"land3\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==2)) //第三塊地且狀態為種植中
            echo "<img id=\"land3\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==3)&&($rs1['lstatus']==3)) //第三塊地且狀態為種植完成
            echo "<img id=\"land3\" src=\"img\p",$rs1['sid'],".png\">";
        //land4
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==0)) //第四塊地且狀態為可種植
            echo "<img id=\"land4\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==2)) //第四塊地且狀態為種植中
            echo "<img id=\"land4\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==4)&&($rs1['lstatus']==3)) //第四塊地且狀態為種植完成
            echo "<img id=\"land4\" src=\"img\p",$rs1['sid'],".png\">";
        //land5
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==1)) //第五塊地且狀態為未解鎖
            echo "<img id=\"land5\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==0)) //第五塊地且狀態為可種植
            echo "<img id=\"land5\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==2)) //第五塊地且狀態為種植中
            echo "<img id=\"land5\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==5)&&($rs1['lstatus']==3)) //第五塊地且狀態為種植完成
            echo "<img id=\"land5\" src=\"img\p",$rs1['sid'],".png\">";
        //land6
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==1)) //第六塊地且狀態為未解鎖
            echo "<img id=\"land6\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==0)) //第六塊地且狀態為可種植
            echo "<img id=\"land6\" src=\"img\land.png\">";
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==2)) //第六塊地且狀態為種植中
            echo "<img id=\"land6\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==6)&&($rs1['lstatus']==3)) //第六塊地且狀態為種植完成
            echo "<img id=\"land6\" src=\"img\p",$rs1['sid'],".png\">";
        //land7
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==1)) //第七塊地且狀態為未解鎖
            echo "<img id=\"land7\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==0)) //第七塊地且狀態為可種植
            echo "<img id=\"land7\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==2)) //第七塊地且狀態為種植中
            echo "<img id=\"land7\" src=\"img\grow.png\">";
		if(($rs1['lid']%7==0)&&($rs1['lstatus']==3)) //第七塊地且狀態為種植完成
            echo "<img id=\"land7\" src=\"img\p",$rs1['sid'],".png\">";
    }
 ?>
</table>
<a href="2_warehouse.php"><img id="warehouse" src="img\warehouse.png"></a>
<a href="2_shop.php"><img id="shop" src="img\shop.png"></a>
<a href="0_logout.php"><img id="exit" src="img\exit.png"></a>

     <div id="alert">
        <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4 class="alert alert-success">Are u sure to grow it ?</h4>
            <?php
                $sqls = "select * from seed where sid='$sid';";
                $resultss=mysqli_query($conn,$sqls);
                while ($rs1=mysqli_fetch_array($resultss)) {
                    $minute=floor($rs1['stime']/60);
                    echo "<font size=\"4\">種植",$rs1['sid'],"需要花費",$rs1['senergy'],"點體力及",$minute,"分",$rs1['stime']-($minute*60),"秒","</font>";
                }
            ?>
        <br/><br/><br/>
        <p>
        <a class="btn btn-danger" href="checkseed.php">確定</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="1_main.php">返回</a>
        </p>
        </div>
    </div>

</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>