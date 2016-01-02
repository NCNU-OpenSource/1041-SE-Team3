<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=(int)$_GET['glid'];
$nowtime=time();
$sql="select * from land where uid='$id' and lid='$lid';";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
$ftime=$rs['ltime'];
$time=$ftime-$nowtime;
if($time>0){
	$h=floor($time/3600);
	$time=$time-($h*3600);
	$m=floor($time/60);
	$time=$time-($m*60);
	$s=$time%60;
	echo "剩下 $h : $m : $s ";
	header("refresh:1;url=seestatus.php?glid=$lid");
}
else{
	$sql1 = "update land set `lstatus`=3 where `lid`='$lid' and `uid`='$id';";
	mysqli_query($conn,$sql1);
	header("Location:1_main.php");
}
?>
