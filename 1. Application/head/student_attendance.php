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
<label>Subject</label>
<select name="subject" required class="form-control mb-2">
<option value="">- Select -</option>
<?php
$sql="select * from subject where section='".$head['section']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['subject_name'];?></option>
<?php } ?>
</select>
<label>Class</label>
<select name="class" required id="class" class="form-control mb-2">
<option value="">- Select -</option>

</select>
<label>Section</label>
<select name="section" required id="section" class="form-control mb-2">
<option value="">- Select -</option>
</select>
<label>Date</label>
<input type="date" name="date" required class="form-control mb-2">
<button type="submit" name="submit" class="btn btn-info mt-3">View Attendance</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){
	$subject=$_POST['subject'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$date=$_POST['date'];
?>
<div class="col-8">
<div class="card">
<div class="card-header">
View Attendance
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Roll No</th>
<th>Name</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select student.roll_no, student.name, student_attendance_details.status from student_attendance_details INNER JOIN student on student.id=student_attendance_details.student_id INNER JOIN student_attendance ON student_attendance.id=student_attendance_details.attendance_id where student_attendance.subject_id='$subject' AND (student_attendance.class_id='$class' AND (student_attendance.section_id='$section' AND date_format(student_attendance.date,'%Y-%m-%d')='$date'))";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['status'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php } ?>


</div>

</div>
</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
$('#data').DataTable();
});
$(document).ready(function(){
	function loadData(type, class_id){
		$.ajax({
			url : "load_section.php",
			type: "POST",
			data: { type: type, id : class_id},
			success: function(data){
				if(type=="sectionData")
				{
					$("#section").html(data);
					
				}
				else{
				$("#class").append(data);
				}
				
			}

		});
	}
	loadData();
	$("#class").on("change",function(){
		var station = $("#class").val();
		loadData("sectionData",station);
		})
	
});

</script>
