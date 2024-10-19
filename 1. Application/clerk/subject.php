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
Add Subject
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Subject Name</label>
<input type="text" name="name" required class="form-control mb-2">
<label>Section</label>
<select name="section" required class="form-control mb-2">
<option value="">- Select -</option>
<option value="primary">Primary Section</option>
<option value="middle">Middle Section</option>
</select>
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View Subject
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Subject&nbsp;Name</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select * from subject where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['subject_name'];?></td>
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
	$name=$_POST['name'];
	$section=$_POST['section'];
	$sql="insert into subject values('','".$clerk['school_id']."','$name','$section')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='subject.php'
		alert('Subject Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='subject.php'
		alert('Sorry try again later')</script>";
	}
}
?>