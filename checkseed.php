<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=$_SESSION['glid'];
$sid=$_SESSION['gsid'];

$sql = "select * from warehouse where `uid`='$id' and `sid`='$sid';";
$results = mysqli_query($conn,$sql);
while($rs=mysqli_fetch_array($results)){
    if(($rs['sid']=='tomato')&&($rs['scount']!=0)){
        header("Location:grow.php");
    }
    if(($rs['sid']=='tomato')&&($rs['scount']==0)){
        header("Location:seed_alert.php");
    }
    if($rs['sid']=='beetroot'&&$rs['scount']!=0){
        header("Location:grow.php");
    }
    if($rs['sid']=='beetroot'&&$rs['scount']==0){
        header("Location:seed_alert.php");
    }
    if($rs['sid']=='carrot'&&$rs['scount']!=0){
        header("Location:grow.php");
    }
    if($rs['sid']=='carrot'&&$rs['scount']==0){
        header("Location:seed_alert.php");
    }
    if($rs['sid']=='eggplant'&&$rs['scount']!=0){
        header("Location:grow.php");
    }
    if($rs['sid']=='eggplant'&&$rs['scount']==0){
        header("Location:seed_alert.php");
    }
    if($rs['sid']=='yellowbean'&&$rs['scount']!=0){
        header("Location:grow.php");
    }
    if($rs['sid']=='yellowbean'&&$rs['scount']==0){
        header("Location:seed_alert.php");
    }

    //如果數量為0 跳出無擁有此種子的alert
   

}

?>
