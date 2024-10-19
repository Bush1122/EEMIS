<?php
include_once "session.php";
$id=$_REQUEST['id'];
$sql="delete from officer where id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='education_officer.php'
		alert('Education Officer Delete Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='education_officer.php'
		alert('Sorry try again later')</script>";
	}


?>