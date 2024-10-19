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
Please Select
</div>
<div class="card-body">
<form method="post">
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
<label>Date</label>
<input type="date" name="date" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">View Attendance</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>


<div class="col-8">
<div class="card">
<div class="card-header">
View Attendance
</div>
<div class="card-body">
<?php
if(isset($_POST['submit'])){
	$school=$_POST['school'];
	$date=$_POST['date'];
?>
<div class="table-responsive mt-5">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Teacher&nbsp;Name</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select teacher.name, teacher_attendance_details.status from teacher_attendance_details INNER JOIN teacher on teacher.employee_id=teacher_attendance_details.teacher_id INNER JOIN teacher_attendance ON teacher_attendance.id=teacher_attendance_details.attendance_id AND date_format(teacher_attendance.date,'%Y-%m-%d')='$date' AND teacher.school_id='$school'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['status'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>
</div>
</div>
</div>


</div>

</div>
</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
$('#data').DataTable();
});


</script>