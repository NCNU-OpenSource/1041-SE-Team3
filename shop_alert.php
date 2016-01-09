<?php
include"config.php";
$id=$_SESSION['uid'];
$bsid=$_GET['bsid'];
$_SESSION['bsid']=$bsid;
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
#menu{
    position: absolute;
    width:900px;
    top: 20px;
    left: 30px;
}

#cancel{
    position: absolute;
    top: 30px;
    left: 860px;
}
#alert{
    position: absolute;
    top: 200px;
    left: 230px;
    width: 500px;
    background-color: #81DAF5;
    height: 250px;
    border-radius:10px;
    font-family: Microsoft JhengHei;
}

}

</style>
</head>
<body>
<div id="frame">
<a href="1_main.php"><img src="img\dark.png" /></a>
<img id="menu" src="img\shopalert.png" />
<a href="1_main.php"><img id="cancel" src="img\cancel.png"/></a>


     <div id="alert">
        <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4 class="alert alert-success">Are u sure to buy it ?</h4>
            <?php
                $sqls = "select * from seed where sid='$bsid';";
                $resultss=mysqli_query($conn,$sqls);
                while ($rs1=mysqli_fetch_array($resultss)) {
                    echo "<font size=\"4\">購買",$rs1['sid'],"需要花費$",$rs1['sprice'],"<br/><br/></font>";
                }
                $sqla = "select * from user where uid='$id';";
                $result=mysqli_query($conn,$sqla);
                while ($rs=mysqli_fetch_array($result)) {
                    echo "<font size=\"4\">目前擁有金錢為",$rs['umoney'],"</font>";
                }
            ?>
        <br/><br/><br/>
        <p>
        <a class="btn btn-danger" href="checkbuyseed.php">確定</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="2_shop_seed.php">返回</a>
        </p>
        </div>
    </div>

</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>