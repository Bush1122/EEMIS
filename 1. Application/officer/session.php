<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['officer'])){
	header('location:../index.php');
}
$sql="select user.img, officer.id, officer.name, username, password, officer.user_id from officer INNER JOIN user on user.id=officer.user_id where officer.user_id='".$_SESSION['officer']."'";
$result=mysqli_query($con,$sql);
$officer=mysqli_fetch_array($result);


?>