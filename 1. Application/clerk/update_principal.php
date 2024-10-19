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
Update Principal
</div>
<div class="card-body">
<?php
$id=$_REQUEST['id'];
$sql="select * from principal where id='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
<form method="post">
<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name'];?>" required class="form-control mb-2">
<label>CNIC</label>
<input type="text" name="cnic" value="<?php echo $row['cnic'];?>" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">Update</button>
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
$sql="select * from principal where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['cnic'];?></td>
<td><a href="update_principal.php?id=<?php echo $row['id'];?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a></td>
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
	$sql="update principal set name='$name', cnic='$cnic' where id='$id'";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='principal.php'
		alert('Principal Updated Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='principal.php'
		alert('Sorry try again later')</script>";
	}
}
?>