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
Add Principal
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" required class="form-control mb-2">
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
<label>CNIC</label>
<input type="text" name="cnic" required class="form-control mb-2">
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
View Principal
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Principal&nbsp;Name</th>
<th>CNIC</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select * from principal";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['cnic'];?></td>
<td><a href="delete_principal.php?id=<?php echo $row['id'];?>"><button class="btn btn-sm btn-danger ml-1"><i class="fa fa-trash"></i></button></a></td>
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
	$name=$_POST['name'];
	$cnic=$_POST['cnic'];
	$username=$_POST['username'];
	$salary=$_POST['salary'];
	$school=$_POST['school'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
	$img=$_FILES['img']['name'];
	$sql="insert into user values('','$username','$password','$img')";
	$con->query($sql);
	$user_id = $con->insert_id;
	$sql="insert into principal values('','$user_id','$school','$name','$cnic','$salary')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='principal.php'
		alert('Principal Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='principal.php'
		alert('Sorry try again later')</script>";
	}
}
?>