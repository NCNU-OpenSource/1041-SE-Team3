<?php
include"config.php";
$id=$_SESSION['uid'];
$bsid=$_SESSION['bsid'];

$sqla = "select lid from land  where uid='$id' and lstatus=1";
$resultsta=mysqli_query($conn,$sqla);
while ($rsa=mysqli_fetch_array($resultsta)) {
    $lid[]=$rsa['lid'];
    $llid=$lid[0];
}

$sql = "select * from user where `uid`='$id';";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);


$sql2 = "select * from land where `uid`='$id' and `lid`='$llid';";
$results = mysqli_query($conn,$sql2);
while($rs2=mysqli_fetch_array($results)){

    if($rs['ulevel']>=$rs2['llevel']){
        if($rs['umoney']>=$rs2['lmoney']){

            $sql3 = "update land set lstatus=0 where `uid`='$id' and `lid`='$llid';";
            mysqli_query($conn,$sql3) or die("MySQL query error"); 
            $sql4 = "update user set umoney=umoney-5000 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            header("Location: buylandsuccess.php");
        }
        else{
            header("Location: buylandfail.php");
        }
    }
    else{
        header("Location: buylandfail.php");
    }
   
    
}

?>
