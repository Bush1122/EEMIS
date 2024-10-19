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
Add School
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>School Name</label>
<input type="text" name="name" required class="form-control mb-2">
<label>City</label>
<input type="text" name="city" required class="form-control mb-2">
<label>District</label>
<input type="text" name="district" required class="form-control mb-2">
<label>Location</label>
<input type="text" name="location" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View School
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>School&nbsp;Name</th>
<th>City</th>
<th>District</th>
<th>Location</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select * from school";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $row['school_name'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['district'];?></td>
<td><?php echo $row['location'];?></td>
<td><a href="update_school.php?id=<?php echo $row['school_id'];?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a><a href="delete_school.php?id=<?php echo $row['school_id'];?>"><button class="btn btn-sm btn-danger ml-1"><i class="fa fa-trash"></i></button></a></td>
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
	$city=$_POST['city'];
	$district=$_POST['district'];
	$location=$_POST['location'];
	$sql="insert into school values('','".$admin['id']."','$name','$city','$district','$location')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='school.php'
		alert('School Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='school.php'
		alert('Sorry try again later')</script>";
	}
}
?>