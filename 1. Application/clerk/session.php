<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['clerk'])){
	header('location:../index.php');
}
$sql="select user.img, clerk.id, clerk.school_id, clerk.name, username, password, clerk.user_id from clerk INNER JOIN user on user.id=clerk.user_id where clerk.user_id='".$_SESSION['clerk']."'";
$result=mysqli_query($con,$sql);
$clerk=mysqli_fetch_array($result);


?>