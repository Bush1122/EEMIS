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
Update Student
</div>
<div class="card-body">
<?php
$id=$_REQUEST['id'];
$sql="select * from student where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<form method="post">
<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name'];?>" required class="form-control mb-2">
<label>Roll No</label>
<input type="text" name="rollno" value="<?php echo $row['roll_no'];?>" required class="form-control mb-2">
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
<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$rollno=$_POST['rollno'];
	$sql="update student set name='$name', roll_no='$rollno' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='student.php'
		alert('Student Updated Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='student.php'
		alert('Sorry try again later')</script>";
	}
}
?>