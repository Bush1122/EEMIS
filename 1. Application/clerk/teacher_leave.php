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
Add Leave
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Teacher</label>
<select name="teacher" required class="form-control mb-2">
<option value="">- Select -</option>
<?php
$sql="select * from teacher where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['employee_id'];?>"><?php echo $row['name'];?></option>
<?php } ?>
</select>
<label>From Date</label>
<input type="date" name="from" required class="form-control mb-2">
<label>To Date</label>
<input type="date" name="to" required class="form-control mb-2">
<label>Reason</label>
<textarea name="reason" class="form-control mb-2" rows="4"></textarea>
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View Leave
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Teacher&nbsp;Name</th>
<th>Leave&nbsp;Date</th>
<th>Posted&nbsp;Date</th>
<th>Reason</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select name, from_date, to_date, date, reason from teacher_leave INNER JOIN teacher on teacher.employee_id=teacher_leave.teacher_id where school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['from_date']." To ".$row['to_date'];?></td>
<td><?php echo $row['date'];?></td>
<td><?php echo $row['reason'];?></td>
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
	$teacher=$_POST['teacher'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$reason=$_POST['reason'];
	date_default_timezone_set("Asia/Karachi");
	$date=date('Y-m-d');
	$sql="insert into teacher_leave values('','$teacher','$from','$to','$date','$reason')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='teacher_leave.php'
		alert('Leave Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='teacher_leave.php'
		alert('Sorry try again later')</script>";
	}
}
?>