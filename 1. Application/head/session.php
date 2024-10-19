<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['head'])){
	header('location:../index.php');
}
$sql="select user.img, head.id, head.school_id, head.name, username, password, head.user_id, section from head INNER JOIN user on user.id=head.user_id where head.user_id='".$_SESSION['head']."'";
$result=mysqli_query($con,$sql);
$head=mysqli_fetch_array($result);


?>