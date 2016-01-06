<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=(int)$_GET['lid'];

	$sql1 = "update land set `lstatus`=3 , `ltime`=NULL where `lid`='$lid' and `uid`='$id';";
	mysqli_query($conn,$sql1);
	header("Location:1_main.php");

?>
