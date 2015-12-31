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
    font-size:40px;
    color:white;
}
#list2 { 
    position: absolute;
    border:0; 
    border-collpase:collpase;  
    top: 150px;
    left: 355px;
    font-weight: bold;
    font-family:  Arimo;
    font-size:40px;
    color:white;
}
#list3 { 
    position: absolute;
    border:0; 
    border-collpase:collpase;  
    top: 150px;
    left: 620px;
    font-weight: bold;
    font-family:  Arimo;
    font-size:40px;
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
#land3{
    position: absolute;
    top: 240px;
    left: 340px;
}
#land4{
    position: absolute;
    top: 360px;
    left: 340px;
}
#land5{
    position: absolute;
    top: 240px;
    left: 460px;
}
#land6{
    position: absolute;
    top: 360px;
    left: 460px;
}
#land7{
    position: absolute;
    top: 240px;
    left: 580px;
}
}
</style>
</head>
<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\warehouse_seed.png" />
<a href="2_warehouse.php"><p id="product">成品</p></a>
<a href="2_warehouse_seed.php"><p id="seed">種子</p></a>
<table id='list1' >
<?php
	$sql = "select * from warehouse where uid='$id'";
    $results=mysqli_query($conn,$sql);	
	
	while ($rs=mysqli_fetch_array($results)) {    
        if($rs['sid']=='tomato'){
            echo "<tr><td><img src=\"img\stomato.png\" width='130' height='130'></td><td width ='100px'>X",$rs['scount'],"</td></tr>";
        }
        if($rs['sid']=='eggplant'){
            echo "<tr><td><img src=\"img\seggplant.png\" width='130' height='130'></td><td>X",$rs['scount'],"</td></tr>";
        }
    }
?>
</table>
<table id='list2' >
<?php
	$sql = "select * from warehouse where uid='$id'";
    $results=mysqli_query($conn,$sql);	
	while ($rs=mysqli_fetch_array($results)) {    
        if($rs['sid']=='beetroot'){
            echo "<tr><td><img src=\"img\sbeetroot.png\" width='130' height='130'></td><td width ='100px'>X",$rs['scount'],"</td></tr>";
        }
        if($rs['sid']=='carrot'){
            echo "<tr><td><img src=\"img\scarrot.png\" width='130' height='130'></td><td>X",$rs['scount'],"</td></tr>";
        }
    }
?>
</table>
<table id='list3' >
<?php
	$sql = "select * from warehouse where uid='$id'";
    $results=mysqli_query($conn,$sql);	
	while ($rs=mysqli_fetch_array($results)) {    
        if($rs['sid']=='yellowbean'){
            echo "<tr><td><img src=\"img\syellowbean.png\" width='130' height='130'></td><td width ='100px'>X",$rs['scount'],"</td></tr>";
        }
    }
?>
</table>
</div>
</body>
</html>