<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['principal'])){
	header('location:../index.php');
}
$sql="select user.img, principal.id, principal.school_id, principal.name, username, password, principal.user_id from principal INNER JOIN user on user.id=principal.user_id where principal.user_id='".$_SESSION['principal']."'";
$result=mysqli_query($con,$sql);
$principal=mysqli_fetch_array($result);


?>