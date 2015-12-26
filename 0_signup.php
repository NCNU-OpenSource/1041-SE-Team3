<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$host = 'localhost';
$user = 'se3';
$pass = '12345';
$db = 'farmdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); 
mysqli_query($conn,"SET NAMES utf8"); 

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$name = $_POST['uname'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pwd != null && $name != null )
{
        //新增資料進user table
        $sql = "insert into user (uid, pwd, uname, ulevel) values ('$id', '$pwd', '$name', '1')";
        if(mysqli_query($conn,$sql))
        {
        	    header("Location:sign_success.php");
        }        
        else
        {       
        	    header("Location:sign_fail.php");
        }

        //新增使用者id進land table
        //初始開放1,2,3,4塊土地
        $sql1 = "insert into land (lid, uid) values ('1', '$id')";
        mysqli_query($conn,$sql1)or die("insert error");
        $sql2 = "insert into land (lid, uid) values ('2', '$id')";
        mysqli_query($conn,$sql2)or die("insert error");
        $sql3 = "insert into land (lid, uid) values ('3', '$id')";
        mysqli_query($conn,$sql3)or die("insert error");
        $sql4 = "insert into land (lid, uid) values ('4', '$id')";
        mysqli_query($conn,$sql4)or die("insert error");
        //未解鎖的土地5,6,7 限制lv2 $5000
        $sql5 = "insert into land (lid, lmoney, llevel, lstatus, uid) values ('5', '5000', '2', '1', '$id')";
        mysqli_query($conn,$sql5)or die("insert error");
        $sql6 = "insert into land (lid, lmoney, llevel, lstatus, uid) values ('6', '5000', '2', '1', '$id')";
        mysqli_query($conn,$sql6)or die("insert error");
        $sql7 = "insert into land (lid, lmoney, llevel, lstatus, uid) values ('7', '5000', '2', '1', '$id')";
        mysqli_query($conn,$sql7)or die("insert error");

        //新增使用者id進去warehouse table
        $sql8 = "insert into warehouse (uid, sid, scount, pid, pcount) values ('$id', 'tomato', '1', 'tomato', '0')";
        mysqli_query($conn,$sql8)or die("insert error");
        $sql9 = "insert into warehouse (uid, sid, scount, pid, pcount) values ('$id', 'beetroot', '1', 'beetroot', '0')";
        mysqli_query($conn,$sql9)or die("insert error");
        $sql10 = "insert into warehouse (uid, sid, scount, pid, pcount) values ('$id', 'carrot', '1', 'carrot', '0')";
        mysqli_query($conn,$sql10)or die("insert error");
        $sql11 = "insert into warehouse (uid, sid, scount, pid, pcount) values ('$id', 'eggplant', '0', 'eggplant', '0')";
        mysqli_query($conn,$sql11)or die("insert error");
        $sql12 = "insert into warehouse (uid, sid, scount, pid, pcount) values ('$id', 'yellowbean', '0', 'yellowbean', '0')";
        mysqli_query($conn,$sql12)or die("insert error");

        //新增使用者id進去store
        $sql13 = "insert into store (uid, sid, pid) values ('$id', 'tomato', 'tomato')";
        mysqli_query($conn,$sql13)or die("insert error");
        $sql14 = "insert into store (uid, sid, pid) values ('$id', 'beetroot', 'beetroot')";
        mysqli_query($conn,$sql14)or die("insert error");
        $sql15 = "insert into store (uid, sid, pid) values ('$id', 'carrot', 'carrot')";
        mysqli_query($conn,$sql15)or die("insert error");
        $sql16 = "insert into store (uid, sid, pid) values ('$id', 'eggplant', 'eggplant')";
        mysqli_query($conn,$sql16)or die("insert error");
        $sql17 = "insert into store (uid, sid, pid) values ('$id', 'yellowbean', 'yellowbean')";
        mysqli_query($conn,$sql17)or die("insert error");

}
else
{
        header("Location:sign_fail.php");
}
?>