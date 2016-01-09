<?php
include"config.php";
$id=$_SESSION['uid'];
$bsid=$_SESSION['bsid'];
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
        <h4 class="alert alert-success">Fail !</h4>
            <?php
                echo "<font size=\"4\">&nbsp;購買失敗 !","<br/><br/></font>";
                echo "<font size=\"4\">&nbsp;請確認所需的等級和金錢是否足夠","</font>";
            ?>
        <br/><br/><br/>
        <p>
        <a class="btn btn-danger" href="2_shop_seed.php">返回</a>
        </p>
        </div>
    </div>

</div>
<audio src="music/happy.mp3" controls autoplay loop hidden="true" >
</body>
</html>