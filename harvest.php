<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=$_SESSION['glid'];
$a=(int)$_GET['a'];
$sql = "select * from user where `uid`='$id';";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
 
if($a==1){//金錢
	if($rs['umoney']<50)
		header("Location:money_alert.php");
	else{
		$sql1 = "update user set umoney=umoney-50 , uexp=uexp+15 where `uid`='$id';";
		mysqli_query($conn,$sql1);
	}
}
else if($a==2){//體力
	if($rs['uenergy']<1)
		header("Location:energy_alert.php");
	else{
		$sql1 = "update user set uenergy=uenergy-1, uexp=uexp+15 where `uid`='$id';";
		mysqli_query($conn,$sql1);
	}
}
$sql4 = "select * from land where `lid`='$lid' and `uid`='$id';";
$results=mysqli_query($conn,$sql4);
$rs1=mysqli_fetch_array($results);
$sid=$rs1['sid'];

$sql2 = "update land set `lstatus`=0,`ltime`=NULL,`sid`=NULL where `lid`='$lid' and `uid`='$id';";
mysqli_query($conn,$sql2);
	
$sql3 = "update warehouse set pcount=pcount+1 where `uid`='$id' and `pid`='$sid';";
mysqli_query($conn,$sql3);

header("Location:1_main.php");


?>