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
View Result
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Roll No</th>
<th>Name</th>
<th>Obtained Marks</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select student.roll_no, student.name, result_details.marks from result_details INNER JOIN student on student.id=result_details.student_id INNER JOIN result ON result.id=result_details.result_id where result.subject_id='$subject' AND (result.class_id='$class' AND result.section_id='$section')";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['marks'];?></td>
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
