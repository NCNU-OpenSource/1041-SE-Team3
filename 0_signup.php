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
        //新增資料進資料庫語法
        $sql = "insert into user (uid, pwd, uname) values ('$id', '$pwd', '$name')";
        if(mysqli_query($conn,$sql))
        {
        	    header("Location:sign_success.php");
        }        
        else
        {       
        	    header("Location:sign_fail.php");
        }
}
else
{
        header("Location:sign_fail.php");
}
?>