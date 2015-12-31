<?php
include"config.php";
$id=$_SESSION['uid'];
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
    border:0; 
    border-collpase:collpase;  
    top: 150px;
    left: 90px;
    font-weight: bold;
    font-family:  Arimo;
    font-size:30px;
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
	color:#993300;
    font-size:25px;
}
#seed{
    position: absolute;
    top: 77px;
    left: 170px;
    font-weight: bold;
    font-family:  Arimo;
    color:white;
    font-size:25px;
}
td {
    text-align: center;
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
<img id="menu" src="img\warehouse_seed.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png" /></a>
<a href="2_warehouse.php"><p id="product">成品</p></a>
<a href="2_warehouse_seed.php"><p id="seed">種子</p></a>
<table id='list1' >
<tr><td><img src='img\tomato.png' width='115' height='110'></td>
<?php //獲得tomato的價格
	$sql = "select * from warehouse where pid = 'tomato' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 170px>",$rs['scount'] ," unit</td>" ;
	}
?>
<td><img src='img\eggplant.png' width='95' height='95'></td>
<?php //獲得tomato的價格
	$sql = "select * from warehouse where pid = 'eggplant' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 170px>",$rs['scount'] ," unit</td>" ;
	}
?>
<td><img src='img\carrot.png' width='95' height='95'></td>
<?php //獲得tomato的價格
	$sql = "select * from warehouse where pid = 'carrot' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 170px>",$rs['scount'] ," unit</td>" ;
	}
?>
<tr><td><img src='img\beetroot.png' width='95' height='95'></td>
<?php //獲得tomato的價格
	$sql = "select * from warehouse where pid = 'beetroot' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 170px>",$rs['scount'] ," unit</td>" ;
	}
?>
<td><img src='img\yellowbean.png' width='95' height='95'></td>
<?php //獲得tomato的價格
	$sql = "select * from warehouse where pid = 'yellowbean' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 170px>",$rs['scount'] ," unit</td>" ;
	}
?>

</table>
</div>
</body>
</html>