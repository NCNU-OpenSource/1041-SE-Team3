<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=$_SESSION['glid'];
$sid=$_SESSION['gsid'];
//$nowtime=time();
$time=date('U')+25200;

$sql = "select * from seed where `sid`='$sid';";
$results = mysqli_query($conn,$sql);
while($rs=mysqli_fetch_array($results)){
	$sexp = $rs['sexp'];
	$senergy = $rs['senergy'];
}



$sql4 = "select * from user where `uid`='$id';";
$result1 = mysqli_query($conn,$sql4);
while($rs1=mysqli_fetch_array($result1)){
	$uenergy = $rs1['uenergy'];
}
if($uenergy < $senergy)
	header("Location:energy_alert.php");
else{
	$sql0 = "select * from seed where `sid`='$sid';";
	$results = mysqli_query($conn,$sql0);
    while($rs1=mysqli_fetch_array($results)){
	    $sql1 = "update land set `lstatus`=2, ltime='".$time."'+'".$rs1['stime']."' ,`sid`='$sid' where `lid`='$lid' and `uid`='$id';";
	    mysqli_query($conn,$sql1);
	
	    $sql2 = "update warehouse set scount=scount-1 where `uid`='$id' and `sid`='$sid';";
	    mysqli_query($conn,$sql2);
	
	    $sql3 = "update user set uexp=uexp+".$sexp.", uenergy=uenergy-".$senergy." where `uid`='$id';";
	    mysqli_query($conn,$sql3);

	    header("Location:1_main.php");
	}
	
}

?>