<?php
include"config.php";
$id=$_SESSION['uid'];
$_SESSION['tomato']=mysqli_real_escape_string($conn,$_POST['tomato']);
$_SESSION['eggplant']=mysqli_real_escape_string($conn,$_POST['eggplant']);
$_SESSION['yellowbean']=mysqli_real_escape_string($conn,$_POST['yellowbean']);
$_SESSION['carrot']=mysqli_real_escape_string($conn,$_POST['carrot']);
$_SESSION['beetroot']=mysqli_real_escape_string($conn,$_POST['beetroot']);
$array = array();
$i=0;
$total=0;
$sql = "select * from product;";
$results=mysqli_query($conn,$sql);
while (	$row=mysqli_fetch_assoc($results)) {
	$array[$i]= $row['pprice'];
	$i++;
	}
$total=$_SESSION['beetroot']*$array[0];
$total=$_SESSION['carrot']*$array[1]+$total;
$total=$_SESSION['eggplant']*$array[2]+$total;
$total=$_SESSION['tomato']*$array[3]+$total;
$total=$_SESSION['yellowbean']*$array[4]+$total;
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
#list1 { 
    position: absolute;
    top: 150px;
    left: 70px;
    font-weight: bold;
    font-family:  Arimo;
    font-size:20px;
	text-align=center;
    color:white;
}
#menu{
    position: absolute;
    width:900px;
    top: 20px;
    left: 30px;
}
#product{
    position: absolute;
    top: 77px;
    left: 72px;
    font-weight: bold;
    font-family:  Arimo;
	color:white;
    font-size:25px;
}
#seed{
    position: absolute;
    top: 77px;
    left: 170px;
    font-weight: bold;
    font-family:  Arimo;
	color:#993300;
    font-size:25px;
}

#border {
    border: 1px solid black;
    border-collapse: collapse;
	text-align: center;
}
h1{
	position:absolute;
	top:16px;
	left:410px;
	color:white;
}
#cancel{
    position: absolute;
    top: 30px;
    left: 860px;
}
</style>
</head>
<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\warehouse_product.png" />
<h1>確認出售</h1>
<a href="1_main.php"><img id="cancel" src="img\cancel.png" /></a>
<a href="2_warehouse_seed.php"><p id="seed">種子</p></a>
<a href="2_warehouse.php" ><p id="product">成品</p></a>
<form method="post" action="warehouse_sell.php">
<table id='list1' >
<tr><td><img src='img\tomato.png' width='115' height='110'></td>
<td id="border" width=80px><?php echo $_SESSION['tomato'] ?> unit</td>
<td><img src='img\eggplant.png' width='95' height='95'></td>
<td id="border" width=80px><?php echo $_SESSION['eggplant'] ?> unit</td>
<td><img src='img\carrot.png' width='95' height='95'></td>
<td id="border" width=80px><?php echo $_SESSION['carrot'] ?> unit</td>
<?php //獲得tomato的價格
	$sql = "select * from product where pid = 'tomato' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<tr><td></td><td id='border' width = 170px>$",$rs['pprice']*$_SESSION['tomato'] ,"</td><td></td>" ;
	}
?>
<?php //獲得eggplant的價格
	$sql = "select * from product where pid = 'eggplant' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td id='border' width = 170px>$",$rs['pprice']*$_SESSION['eggplant'],"</td><td></td>" ;
	}
?>
<?php //獲得carrot的價格
	$sql = "select * from product where pid = 'carrot' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td id='border' width = 170px>$",$rs['pprice']*$_SESSION['carrot'] ,"</td></tr>" ;
	}
?>
<tr><td><img src='img\beetroot.png' width='95' height='95'></td>
<td id='border' width=80px><?php echo $_SESSION['beetroot']?> unit</td>
<td><img src='img\yellowbean.png' width='95' height='95'></td>
<td id='border' width=80px><?php echo $_SESSION['yellowbean'] ?> unit</td>
<td><a href="warehouse_com.php" > <img src='img\sell.png' width='95' height='95'></td>
<td><a href="1_main.php" > <img src='img\cancel.png' width='75' height='75'></td>
<tr>
<?php //獲得beetroot&yellowbean的價格
	$sql = "select * from product where pid = 'beetroot' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td></td><td id='border' width = 150px>$",$rs['pprice']*$_SESSION['beetroot'] ,"</td>" ;
	}
?>
<?php //獲得beetroot&yellowbean的價格
	$sql = "select * from product where pid = 'yellowbean' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td></td><td id='border' width = 150px>$",$rs['pprice']*$_SESSION['yellowbean'] ,"</td>" ;
	}
 echo "<td id='border'>total :$$total</td>";
	$_SESSION['total']=$total;
?>
</div>
<embed src="music/happy.mp3" autostart="true" hidden="true" loop="true">
</body>
</html>