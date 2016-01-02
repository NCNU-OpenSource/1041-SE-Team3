<?php
include"config.php";
$id=$_SESSION['uid'];
$lid=(int)$_GET['glid'];
$_SESSION['glid']=$lid;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Happy Farm</title>

<style type="text/css">

</style>
</head>
<body>
<table>

<tr><td colspan=2>使用金錢或是體力採收</td></tr>
<tr><td><a href='harvest.php?a=1'>金錢</a>(-50)</td>
<td><a href='harvest.php?a=2'>體力</a>(-1)</td></tr>

</table>
<a href='1_main.php?a=2'>返回</a>
</div>
</body>
</html>