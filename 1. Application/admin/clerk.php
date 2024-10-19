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
Add School Clerk
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>School</label>
<select name="school" required class="form-control mb-2">
<option value="">- Select -</option>
<?php
$sql="select * from school";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['school_id'];?>"><?php echo $row['school_name'];?></option>
<?php } ?>
</select>
<label>Name</label>
<input type="text" name="name" required class="form-control mb-2">
<label>Username</label>
<input type="text" name="username" required class="form-control mb-2">
<label>Image</label>
<input type="file" name="img" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View School Clerk
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>Clerk&nbsp;Name</th>
<th>School&nbsp;Name</th>
<th>Username</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql="select school_name, name, username, clerk.id from clerk INNER JOIN school on school.school_id=clerk.school_id INNER JOIN user on user.id=clerk.user_id";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['school_name'];?></td>
<td><?php echo $row['username'];?></td>
<td><a href="delete_clerk.php?id=<?php echo $row['id'];?>"><button class="btn btn-sm btn-danger ml-1"><i class="fa fa-trash"></i></button></a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
$('#data').DataTable();
});
</script>
<?php
if(isset($_POST['submit'])){
	function password_generate($chars){
		$data='1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		return substr(str_shuffle($data),0,$chars);
		
	}
	$school=$_POST['school'];
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=password_generate(8);
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into user values('','$username','$password','$img')";
	$con->query($sql);
	$user_id = $con->insert_id;
	$sql="insert into clerk values('','$user_id','$school','$name')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='clerk.php'
		alert('Clerk Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='clerk.php'
		alert('Sorry try again later')</script>";
	}
}
?>