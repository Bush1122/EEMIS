<?php
include_once "header.php";
?>
<div class="container-fluid">
<div class="row">
<?php
include_once "navbar.php";
?>
<div class="col-10 data-container">

<div class="row">
<div class="col-4">
<div class="card">
<div class="card-header">
Manage Account
</div>
<div class="card-body">
<form method="post">
<label>Username</label>
<input type="text" name="username" value="<?php echo $teacher['username'];?>" required class="form-control mb-2">
<label>Password</label>
<input type="password" name="password" value="<?php echo $teacher['password'];?>" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">

</div>

</div>

</div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="update user set username='$username', password='$password' where id='".$teacher['user_id']."'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='manage_account.php'
		alert('Profile Update Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='manage_account.php'
		alert('Sorry try again later')</script>";
	}
}
?>