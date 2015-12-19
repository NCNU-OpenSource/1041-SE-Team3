<?php
session_start();

$host = 'localhost';
$user = 'se3';
$pass = '12345';
$db = 'farmdb';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); 
mysqli_query($conn,"SET NAMES utf8"); 

if(!isset($_SESSION["uid"])) {
		header("Location: 0_login.php");
    }
if($_SESSION["uid"] == "" ){ 
		header("Location: 0_login.php");
    }

?>