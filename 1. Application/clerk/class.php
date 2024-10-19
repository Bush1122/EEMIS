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
Add Class
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Section</label>
<select name="section" required class="form-control mb-2">
<option value="">- Select -</option>
<option value="primary">Primary Section</option>
<option value="middle">Middle Section</option>
</select>
<label>Class Name</label>
<input type="text" name="name" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View Class
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Class&nbsp;Name</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select * from class where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['class_name'];?></td>
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
	$section=$_POST['section'];
	$name=$_POST['name'];
	$sql="insert into class values('','".$clerk['school_id']."','$section','$name')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='class.php'
		alert('Class Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='class.php'
		alert('Sorry try again later')</script>";
	}
}
?>