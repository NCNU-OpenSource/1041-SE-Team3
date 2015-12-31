<?php
	include"config.php";
	$id=$_SESSION['uid'];
	$total = $_SESSION['total'];
	$tomato = $_SESSION['tomato'];
	$yellowbean = $_SESSION['yellowbean'];
	$carrot = $_SESSION['carrot'];
	$eggplant = $_SESSION['eggplant'];
    $beetroot = $_SESSION['beetroot'];
	echo $total;
	echo $id;
	$sql = "update user set umoney=umoney+$total where `uid`='$id';";
	mysqli_query($conn,$sql) or die("MySQL query error"); 
	$sql1 = "update warehouse set pcount=pcount-$tomato where `uid`='$id' and `pid`='tomato';";
	mysqli_query($conn,$sql1) or die("MySQL query error"); 
	$sql1 = "update warehouse set pcount=pcount-$eggplant where `uid`='$id' and `pid`='eggplant';";
	mysqli_query($conn,$sql1) or die("MySQL query error"); 
	$sql1 = "update warehouse set pcount=pcount-$yellowbean where `uid`='$id' and `pid`='yellowbean';";
	mysqli_query($conn,$sql1) or die("MySQL query error"); 
	$sql1 = "update warehouse set pcount=pcount-$beetroot where `uid`='$id' and `pid`='beetroot';";
	mysqli_query($conn,$sql1) or die("MySQL query error"); 
	$sql1 = "update warehouse set pcount=pcount-$carrot where `uid`='$id' and `pid`='carrot';";
	mysqli_query($conn,$sql1) or die("MySQL query error"); 
	header("Location: 2_warehouse.php");

?>