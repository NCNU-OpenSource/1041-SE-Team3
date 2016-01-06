<?php
include"config.php";
$id=$_SESSION['uid'];

//for timer
    $sqla = "select count(lid) as r from land  where uid='$id' and lstatus=2";
    $resultsta=mysqli_query($conn,$sqla);
    $rsa=mysqli_fetch_array($resultsta);
    $sqltimer = "select lid , land.sid , ltime from land , seed  where uid='$id' and lstatus=2 and land.sid=seed.sid";
    $resultst=mysqli_query($conn,$sqltimer);
    while ($rst=mysqli_fetch_array($resultst)) {
        $lid[]=$rst['lid'];
        $sid[]=$rst['sid'];
        $endtime[]=$rst['ltime'];
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="jQuery/countdown.min.js"></script>
<link rel="stylesheet" href="css/main.css">
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
.timer1{
    position: absolute;
    font-size: 36px;
    font-family: impact;
    color:#F7D358;
    top: 240px;
    left: 220px;
    z-index: 5;
}
</style>


<script language="javascript">

    function start(){
        <?php for($i=1;$i<=$rsa['r'];$i++){?>
            new Countdown({
                selector: '.timer<?php echo $lid[$i-1];?>',
                msgBefore: "",
                msgAfter: "<?php echo "<a href='growok.php?lid=".$lid[$i-1]."'><img src='img/timesup.png'></a>";?>",
                msgPattern: "{minutes} : {seconds} ",
                dateStart: new Date(),
                dateEnd: new Date('<?php echo date("M d, Y H:i:s",$endtime[$i-1])?>'),
                onStart: function() {
                    console.log('start');
                },
                onEnd: function() { 
                    console.log('end');
                },
            });
        <?php   };?>
    };

    window.onload=function(){
        start();
    }


</script> 


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

    //印出土地狀態
    $sql1 = "select * from land where uid='$id';";
    $results1=mysqli_query($conn,$sql1);
    //status 0=可種植 1=未解鎖 2=種植中 3=種植完成
    while ($rs1=mysqli_fetch_array($results1)) { 
        //land1  
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==0)) //第一塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land1\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==2)){ //第一塊地且狀態為種植中
<<<<<<< HEAD
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land1\" src=\"img\grow.png\"></a><span class=\"timer1\"></span>";
=======
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land1\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		}
        if(($rs1['lid']%7==1)&&($rs1['lstatus']==3)) //第一塊地且狀態為種植完成
          echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land1\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land2
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==0)) //第二塊地且狀態為可種植
<<<<<<< HEAD
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land2\"  src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==2)) //第二塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land2\" src=\"img\grow.png\"></a><span class=\"timer2\"></span>";
		
=======
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land2\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==2)&&($rs1['lstatus']==2)){ //第二塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land2\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
		}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		if(($rs1['lid']%7==2)&&($rs1['lstatus']==3)) //第二塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land2\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land3
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==0)) //第三塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land3\" src=\"img\land.png\"></a>";
<<<<<<< HEAD
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==2)) //第三塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land3\" src=\"img\grow.png\"></a><span class=\"timer3\"></span>";
=======
        if(($rs1['lid']%7==3)&&($rs1['lstatus']==2)){ //第三塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land3\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
		}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		if(($rs1['lid']%7==3)&&($rs1['lstatus']==3)) //第三塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land3\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land4
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==0)) //第四塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land4\" src=\"img\land.png\"></a>";
<<<<<<< HEAD
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==2)) //第四塊地且狀態為種植中
           echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land4\" src=\"img\grow.png\"></a><span class=\"timer4\"></span>";
		
=======
        if(($rs1['lid']%7==4)&&($rs1['lstatus']==2)){ //第四塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land4\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
		}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		if(($rs1['lid']%7==4)&&($rs1['lstatus']==3)) //第四塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land4\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land5
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==1)) //第五塊地且狀態為未解鎖
            echo "<img id=\"land5\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==0)) //第五塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land5\" src=\"img\land.png\"></a>";
        if(($rs1['lid']%7==5)&&($rs1['lstatus']==2)){ //第五塊地且狀態為種植中
<<<<<<< HEAD
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land5\" src=\"img\grow.png\"></a><span class=\"timer5\"></span>";
=======
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land5\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		}
		if(($rs1['lid']%7==5)&&($rs1['lstatus']==3)) //第五塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land5\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land6
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==1)) //第六塊地且狀態為未解鎖
            echo "<img id=\"land6\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==0)) //第六塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land6\" src=\"img\land.png\"></a>";
<<<<<<< HEAD
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==2)) //第六塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land6\" src=\"img\grow.png\"><span class=\"timer6\"></span>";
		
=======
        if(($rs1['lid']%7==6)&&($rs1['lstatus']==2)){ //第六塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land6\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
		}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		if(($rs1['lid']%7==6)&&($rs1['lstatus']==3)) //第六塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land6\" src=\"img\p",$rs1['sid'],".png\"></a>";
        
        //land7
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==1)) //第七塊地且狀態為未解鎖
            echo "<img id=\"land7\" src=\"img\gland.png\">";
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==0)) //第七塊地且狀態為可種植
            echo "<a href='selectseed.php?glid=",$rs1['lid'] ,"'><img id=\"land7\" src=\"img\land.png\"></a>";
<<<<<<< HEAD
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==2)) //第七塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land7\" src=\"img\grow.png\"><span class=\"timer7\"></span>";
		
=======
        if(($rs1['lid']%7==0)&&($rs1['lstatus']==2)){ //第七塊地且狀態為種植中
            echo "<a href='seestatus.php?glid=",$rs1['lid'] ,"'><img id=\"land7\" src=\"img\grow.png\"></a>";
			$ftime=$rs1['ltime'];
			$time=$ftime-$nowtime;
			if($time<0){
				$lid=$rs1['lid'];
				$sql2 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
				mysqli_query($conn,$sql2);
			}
		}
>>>>>>> 41c8c138e784588dac21654120e03189fce491ff
		if(($rs1['lid']%7==0)&&($rs1['lstatus']==3)) //第七塊地且狀態為種植完成
            echo "<a href='chooseharvest.php?glid=",$rs1['lid'] ,"'><img id=\"land7\" src=\"img\p",$rs1['sid'],".png\"></a>";
	   
    }


 ?>
</table>



<a href="2_warehouse.php" ><img id="warehouse" src="img\warehouse.png"></a>
<a href="2_shop.php"><img id="shop" src="img\shop.png"></a>
<a href="0_logout.php"><img id="exit" src="img\exit.png"></a>

</div>

<embed src="music/happy.mp3" autostart=true hidden="true" loop="-1">

</body>
</html>