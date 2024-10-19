<?php
include_once "session.php";
$id=$_REQUEST['id'];
$sql="delete from principal_attendance where principal_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from principal where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='principal.php'
		alert('Principal Delete Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='principal.php'
		alert('Sorry try again later')</script>";
	}


?>