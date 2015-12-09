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
	header("Location: 02.main.php");
}
/*
$_SESSION['uID'] = "";

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
		$_SESSION['uID'] = $row['uid'];
		$id=$_SESSION['uID'];
        header("Location: 02.main.php");
		exit(0);
    }
    else {
		echo "Invalid Username or Password - Please try again <br />";
		//header("Refresh: 3; url=0_chooselogin.php");
    }
}
 */      
?>
