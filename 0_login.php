<?php
/*check whether the input info is correct
correct->main.php
error->0_chooselogin.php
*/

session_start();
$host = 'localhost';
$user = 'se3';
$pass = '12345';
$db = 'farmdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); 
mysqli_query($conn,"SET NAMES utf8"); 
//mysql_select_db($db, $conn); 

/*
$uid = addslashes($_POST['id']);
$pwd = addslashes($_POST['pwd']);
$sql_query = "SELECT * FROM `user` WHERE `uid`='".$uid."' AND `pwd`='".$pwd."';";
$result = mysqli_query($conn,$sql_query) or die("Query Fail! ".mysqli_error($conn));
$numRow = mysqli_num_rows($result);
if ($numRow ==0){
	header("Location: 0_elogin.php");
}
else {
	$row=mysqli_fetch_assoc($result);
	header("Location: 1_main.php");
}
*/

$_SESSION['uid'] = "";

if(isset($_POST['id'])){
    $userName = $_POST['id'];
}else{
    $userName= "";
}

if(isset($_POST['pwd'])){
    $passWord = $_POST['pwd'];
}else{
    $passWord= "";
}

$sql = "SELECT * FROM user WHERE uid='" . $userName . "' AND pwd= '" . $passWord . "'";
if ($result = mysqli_query($conn,$sql)) {
	if ($row=mysqli_fetch_array($result)) {
		$_SESSION['uid'] = $row['uid'];
		$id=$_SESSION['uid'];
		
		//更新登入次數(登入次數=1時在1_main.php給提示)
        $sql1 = "UPDATE user SET ucount=(ucount+1) WHERE uid='$id' ;";
	    mysqli_query($conn,$sql1) or die("MySQL update message error"); 
	    
	    //如果登入次數為1，進入新手提示
        $sql2 = "select ucount from user where uid='$id';";
        $results2=mysqli_query($conn,$sql2);
     
        while ($rs2=mysqli_fetch_array($results2)) { 
            if($rs2['ucount']==1){
                header("Location: 1_teach.php");
            }
            else{
            	header("Location: 1_main.php");
		        exit(0);
            }
        }
    }
    else {
		header("Location: 0_elogin.php");
    }
}
      
?>
