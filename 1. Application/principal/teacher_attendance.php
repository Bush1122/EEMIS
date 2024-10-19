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



<div class="col-12">
<div class="card">
<div class="card-header">
View Attendance
</div>
<div class="card-body">
<form method="post">
<label>Date</label>
<input type="date" name="date" required class="form-control mb-2"> 
<button type="submit" name="attendance" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
<?php
if(isset($_POST['attendance'])){
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
$sql="select teacher.name, teacher_attendance_details.status from teacher_attendance_details INNER JOIN teacher on teacher.employee_id=teacher_attendance_details.teacher_id INNER JOIN teacher_attendance ON teacher_attendance.id=teacher_attendance_details.attendance_id AND date_format(teacher_attendance.date,'%Y-%m-%d')='$date' AND teacher.school_id='".$principal['school_id']."'";
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