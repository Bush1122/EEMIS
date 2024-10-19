<?php
include_once "session.php";
$id=$_REQUEST['id'];
$sql="delete from teacher_leave where teacher_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from teacher_attendance_details where teacher_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from teach where teacher_id='$id'";
$result=mysqli_query($con,$sql);
$sql="delete from teacher where employee_id='$id'";
$result=mysqli_query($con,$sql);
if($result){
		echo "<script>window.location.href='teacher.php'
		alert('Teacher Delete Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='teacher.php'
		alert('Sorry try again later')</script>";
	}


?>