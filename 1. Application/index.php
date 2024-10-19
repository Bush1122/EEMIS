<?php
session_start();
?>
<!doctype html>
<html>
<head>
<title>EEMIS</title>
<meta name="viewport" content="device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="section">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="text-center text-white">Elementary Education Management Information System </h2>
</div>
<div class="col-md-5 m-auto">
<div class="card">
<div class="card-body">
<form method="post">
<label>Role</label>
<select name="role" required class="form-control mb-2">
<option value="">- Select -</option>
<option value="1">School Clerk</option>
<option value="2">Subject Teacher</option>
<option value="3">Primary Section Head</option>
<option value="4">Middle Section Head</option>
<option value="6">School Principal</option>
<option value="7">District Education Officer</option>
<option value="8">Admin</option>
</select>
<label>Username</label>
<input type="text" name="username" class="form-control mb-2">
<label>Password</label>
<input type="password" name="password" class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Login <i class="fa fa-sign-in"></i></button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
include_once "dbc.php";
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$role=$_POST['role'];
	$sql="select * from user where username='$username' AND password='$password'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if($row){
		if($role==1){
			$sql="select * from clerk where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['clerk']=$row['id'];
				header('location:clerk/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==2){
			$sql="select * from teacher where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['teacher']=$row['id'];
				header('location:teacher/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==3){
			$sql="select * from head where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['head']=$row['id'];
				header('location:head/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==4){
			$sql="select * from head where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['head']=$row['id'];
				header('location:head/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==6){
			$sql="select * from principal where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['principal']=$row['id'];
				header('location:principal/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==7){
			$sql="select * from officer where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['officer']=$row['id'];
				header('location:officer/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
			
		}
		else if($role==8){
			$sql="select * from admin where user_id='".$row['id']."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				$_SESSION['admin']=$row['id'];
				header('location:admin/home.php');
			}
			else{
				echo "<script>alert('Please enter valid username or password')</script>";
				
			}
		}
	}
	else{
		echo "<script>alert('Invalid username or password')</script>";	
	}
	
	
}

?>