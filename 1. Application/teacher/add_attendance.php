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
$sql="select subject.subject_name, subject.id from teach INNER JOIN subject on subject.id=teach.subject_id where teach.teacher_id='".$teacher['employee_id']."'";
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
<button type="submit" name="submit" class="btn btn-info mt-3">View Student</button>
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
?>

<div class="col-8">
<div class="card">
<div class="card-header">
Add Attendance
</div>
<div class="card-body">
<form method="post">
<input type="hidden" name="subject" value="<?php echo $subject;?>">
<input type="hidden" name="class" value="<?php echo $class;?>">
<input type="hidden" name="section" value="<?php echo $section;?>">
<?php
$sql="select * from student where class_id='$class' AND ( section_id='$section' AND school_id='".$teacher['school_id']."')";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<div class="form-row">
<div class="col">
<input type="text" value="<?php echo $row['roll_no'];?>" readonly class="form-control mb-2">
<input type="hidden" name="id[]" value="<?php echo $row['id'];?>">
</div>
<div class="col">
<input type="text" value="<?php echo $row['name'];?>" readonly class="form-control mb-2">
</div>
<div class="col">
<select name="status[]" required class="form-control mb-2">
<option value="">- Select - </option>
<option value="Present">Present</option>
<option value="Absent">Absent</option>
</select>
</div>
</div>
<?php } ?>
<button type="submit" name="result" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>
<?php }?>


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
<?php
if(isset($_POST['result'])){
	$subject=$_POST['subject'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	
	$student_id=$_POST['id'];
	$status=$_POST['status'];
	date_default_timezone_set("Asia/Karachi");
	$date=date('Y-m-d');
	$sql="insert into student_attendance values('','$subject','$class','$section','$date')";
	$con->query($sql);
	$attendance_id = $con->insert_id;
	for($i=0;$i<count($student_id);$i++){
		$sql="insert into student_attendance_details values('','$attendance_id','".$student_id[$i]."','".$status[$i]."')";
		$result=mysqli_query($con,$sql);
	}
	if($result){
		echo "<script>window.location.href='attendance.php'
		alert('Attendance Added Successfully')</script>";
		
	}
	else{
		echo "<script>window.location.href='add_attendance.php'
		alert('Sorry')</script>";
		
	}
	
}

?>