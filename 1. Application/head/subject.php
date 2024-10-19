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
Assign Subject
</div>
<div class="card-body">
<form method="post">
<label>Teacher</label>
<select name="teacher" required class="form-control mb-2">
<option value="">- Select -</option>
<?php
$sql="select * from teacher where school_id='".$head['school_id']."' AND section='".$head['section']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<option value="<?php echo $row['employee_id'];?>"><?php echo $row['name'];?></option>
<?php } ?>
</select>
<label>Subject</label>
<select name="subject" required class="form-control mb-2">
<option value="">- Select -</option>
<?php
$sql="select * from subject where school_id='".$head['school_id']."' AND section='".$head['section']."'";
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
<button type="submit" name="submit" class="btn btn-info mt-3">Save</button>
<button type="reset" class="btn btn-light mt-3 ml-2">Cancel</button>
</form>
</div>
</div>
</div>

<div class="col-8">
<div class="card">
<div class="card-header">
View Assigned Subject
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Subject</th>
<th>Teacher</th>
<th>Class</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select subject.subject_name, teacher.name, class.class_name, section.section_name from teach INNER JOIN subject on subject.id=teach.subject_id INNER JOIN teacher ON teacher.employee_id=teach.teacher_id INNER JOIN class ON class.id=teach.class_id INNER JOIN section ON section.id=teach.section_id AND (subject.section='".$head['section']."' AND class.section='".$head['section']."')";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['subject_name'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['class_name'];?></td>
<td><?php echo $row['section_name'];?></td>
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
if(isset($_POST['submit'])){
	$teacher=$_POST['teacher'];
	$subject=$_POST['subject'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$sql="insert into teach values('','$teacher','$subject','$class','$section')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='subject.php'
		alert('Subject Assigned Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='subject.php'
		alert('Sorry try again later')</script>";
	}
}
?>