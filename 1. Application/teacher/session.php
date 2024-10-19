<?php
include_once "../dbc.php";
session_start();
if(!isset($_SESSION['teacher'])){
	header('location:../index.php');
}
$sql="select user.img, teacher.employee_id, teacher.school_id, teacher.name, salary, username, password, teacher.user_id, section from teacher INNER JOIN user on user.id=teacher.user_id where teacher.user_id='".$_SESSION['teacher']."'";
$result=mysqli_query($con,$sql);
$teacher=mysqli_fetch_array($result);


?>