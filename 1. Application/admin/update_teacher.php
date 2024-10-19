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
Update Teacher
</div>
<div class="card-body">
<?php
$id=$_REQUEST['id'];
$sql="select * from teacher where employee_id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<form method="post">
<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name'];?>" required class="form-control mb-2">
<label>CNIC</label>
<input type="text" name="cnic" value="<?php echo $row['cnic'];?>" required class="form-control mb-2">
<label>Salary</label>
<input type="number" name="salary" value="<?php echo $row['salary'];?>" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Update</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
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
	$salary=$_POST['salary'];
	$sql="update teacher set name='$name', cnic='$cnic', salary='$salary' where employee_id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='teacher.php'
		alert('Teacher Updated Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='teacher.php'
		alert('Sorry try again later')</script>";
	}
}
?>