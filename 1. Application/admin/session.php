<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['admin'])){
	header('location:../index.php');
}
$sql="select user.img, admin.id, admin.name, username, password, admin.user_id from admin INNER JOIN user on user.id=admin.user_id where admin.user_id='".$_SESSION['admin']."'";
$result=mysqli_query($con,$sql);
$admin=mysqli_fetch_array($result);


?>