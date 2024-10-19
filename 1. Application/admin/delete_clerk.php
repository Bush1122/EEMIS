<?php
include_once "session.php";
$id=$_REQUEST['id'];
$sql="delete from clerk where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='clerk.php'
		alert('Clerk Delete Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='clerk.php'
		alert('Sorry try again later')</script>";
	}


?>