<?php
include_once "session.php";
$id=$_REQUEST['id'];
$sql="delete from head where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='head.php'
		alert('Head Delete Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='head.php'
		alert('Sorry try again later')</script>";
	}


?>