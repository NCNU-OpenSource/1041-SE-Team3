<?php
include"config.php";
$id=$_SESSION['uid'];
$bsid=$_SESSION['bsid'];

$sql = "select * from user where `uid`='$id';";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);


$sql2 = "select * from seed where `sid`='$bsid';";
$results = mysqli_query($conn,$sql2);
while($rs2=mysqli_fetch_array($results)){

    if($rs['ulevel']>=$rs2['slevel']){
        if($rs['umoney']>=$rs2['sprice']){
            $price=$rs2['sprice'];
            $sql3 = "update warehouse set scount=scount+1 where `sid`='$bsid';";
            mysqli_query($conn,$sql3) or die("MySQL query error"); 
            $sql4 = "update user set umoney=umoney-$price where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            header("Location: buysuccess.php");
        }
        else{
            header("Location: buyfail.php");
        }
    }
    else{
        header("Location: buyfail.php");
    }
   
    
}

?>
