<?php
include"config.php";
$id=$_SESSION['uid'];
$i=0;
$j=0;
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
<img id="menu" src="img\warehouse_product.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png"/></a>
<a href="2_warehouse_seed.php"><p id="seed">種子</p></a>
<a href="2_warehouse.php" ><p id="product">成品</p></a>
<form method="post" action="warehouse_sell.php">
<table id='list1' >
<tr><td><img src='img\tomato.png' width='115' height='110'></td>
<td width=80px><select name="tomato">
	<?php //tomato滾輪
		$sql = "select * from warehouse where uid='$id' and pid = 'tomato' ;";
		$results=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($results);
		for($i=0;$i<=$row['pcount'];$i++){
			echo "<option>$i</option>";
		}
	?>
</select></td>
<td><img src='img\eggplant.png' width='95' height='95'></td>
<td width=80px><select name="eggplant">
	<?php //eggplant滾輪
		$sql = "select * from warehouse where uid='$id' and pid = 'eggplant' ;";
		$results=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($results);
		for($i=0;$i<=$row['pcount'];$i++){
			echo "<option>$i</option>";
		}
	?>
</select></td>
<td><img src='img\carrot.png' width='95' height='95'></td>
<td width=80px><select name="carrot">
	<?php //carrot滾輪
		$sql = "select * from warehouse where uid='$id' and pid = 'carrot' ;";
		$results=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($results);
		for($i=0;$i<=$row['pcount'];$i++){
			echo "<option>$i</option>";
		}
	?>
</select></td>
<?php //獲得tomato的價格
	$sql = "select * from product where pid = 'tomato' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<tr><td width = 180px>$",$rs['pprice'] ," per unit</td>" ;
	}
?>
<?php //獲得eggplant的價格
	$sql = "select * from product where pid = 'eggplant' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td></td><td width = 180px>$",$rs['pprice'] ," per unit</td>" ;
	}
?>
<?php //獲得carrot的價格
	$sql = "select * from product where pid = 'carrot' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td></td><td width = 180px>$",$rs['pprice'] ," per unit</td></tr>" ;
	}
?>
<tr><td><img src='img\beetroot.png' width='95' height='95'></td>
<td width=80px><select name="beetroot">
	<?php //beetroot滾輪
		$sql = "select * from warehouse where pid = 'beetroot' ;";
		$results=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($results);
		for($i=0;$i<=$row['pcount'];$i++){
			echo "<option>$i</option>";
		}
	?>
</select></td>
<td><img src='img\yellowbean.png' width='95' height='95'></td>
<td width=80px><select name="yellowbean">
	<?php //yellowbean滾輪
		$sql = "select * from warehouse where pid = 'yellowbean' ;";
		$results=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($results);
		for($i=0;$i<=$row['pcount'];$i++){
			echo "<option>$i</option>";
		}
	?>
</select></td>
<td></td><td><input type="image" src="img\sell.png" alt="OK"/></td>
<tr>
<?php //獲得beetroot&yellowbean的價格
	$sql = "select * from product where pid like '%b%' ;";
    $results=mysqli_query($conn,$sql);	
	while (	$rs=mysqli_fetch_array($results)) {
		echo "<td width = 180px>$",$rs['pprice'] ," per unit</td><td></td>" ;
	}
?>
</table>
</form>
</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>