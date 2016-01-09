<?php
include"config.php";
$id=$_SESSION['uid'];
$a=$_SESSION['a'];

//判斷金錢夠不夠

$sql = "select * from user where `uid`='$id';";
$result=mysqli_query($conn,$sql);

while($rs=mysqli_fetch_array($result)){
    if($a==1){
        if($rs['umoney']>=100){
            $sql4 = "update user set umoney=umoney-100, uenergy=uenergy+2 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            if($rs['uenergy']>=10){
            $sqle = "update user set uenergy=10 where `uid`='$id' ;";
            mysqli_query($conn,$sqle) or die("MySQL query error"); 
            }
            header("Location: buyfoodsuccess.php");
        }
        else{
            header("Location: buyfoodfail.php");
        }
    }
    else if($a==2){
        if($rs['umoney']>=120){
            $sql4 = "update user set umoney=umoney-120, uenergy=uenergy+4 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            if($rs['uenergy']>=10){
            $sqle = "update user set uenergy=10 where `uid`='$id' ;";
            mysqli_query($conn,$sqle) or die("MySQL query error"); 
            }
            header("Location: buyfoodsuccess.php");
        }
        else{
            header("Location: buyfoodfail.php");
        }
    }
    else if($a==3){
        if($rs['umoney']>=150){
            $sql4 = "update user set umoney=umoney-150, uenergy=uenergy+6 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            if($rs['uenergy']>=10){
            $sqle = "update user set uenergy=10 where `uid`='$id' ;";
            mysqli_query($conn,$sqle) or die("MySQL query error"); 
            }
            header("Location: buyfoodsuccess.php");
        }
        else{
            header("Location: buyfoodfail.php");
        }
    }
    else if($a==4){
        if($rs['umoney']>=200){
            $sql4 = "update user set umoney=umoney-200, uenergy=uenergy+8 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            if($rs['uenergy']>=10){
            $sqle = "update user set uenergy=10 where `uid`='$id' ;";
            mysqli_query($conn,$sqle) or die("MySQL query error"); 
            }
            header("Location: buyfoodsuccess.php");
        }
        else{
            header("Location: buyfoodfail.php");
        }
    }
    else if($a==5){
        if($rs['umoney']>=250){
            $sql4 = "update user set umoney=umoney-250, uenergy=uenergy+10 where `uid`='$id';";
            mysqli_query($conn,$sql4) or die("MySQL query error"); 
            if($rs['uenergy']>=10){
            $sqle = "update user set uenergy=10 where `uid`='$id' ;";
            mysqli_query($conn,$sqle) or die("MySQL query error"); 
            }
            header("Location: buyfoodsuccess.php");
        }
        else{
            header("Location: buyfoodfail.php");
        }
    }
}

?>
