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
Add Head
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" required class="form-control mb-2">
<label>Section</label>
<select name="section" required class="form-control mb-2">
<option value="">- Select -</option>
<option value="primary">Primary Section</option>
<option value="middle">Middle Section</option>
</select>
<label>Username</label>
<input type="text" name="username" required class="form-control mb-2">
<label>Salary</label>
<input type="number" name="salary" required class="form-control mb-2">
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
View Head
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Head&nbsp;Name</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select * from head where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['section'];?></td>
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
	$password=password_generate(8);
	$name=$_POST['name'];
	$section=$_POST['section'];
	$username=$_POST['username'];
	$salary=$_POST['salary'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into user values('','$username','$password','$img')";
	$con->query($sql);
	$user_id = $con->insert_id;
	$sql="insert into head values('','$user_id','".$clerk['school_id']."','$name','$section','$salary')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='head.php'
		alert('Head Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='head.php'
		alert('Sorry try again later')</script>";
	}
}
?>