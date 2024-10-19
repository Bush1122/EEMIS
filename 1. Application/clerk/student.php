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
Add Student
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">
<label>Name</label>
<input type="text" name="name" required class="form-control mb-2">
<label>Roll No</label>
<input type="text" name="rollno" required class="form-control mb-2">
<label>Class</label>
<select name="class" required id="class" class="form-control mb-2">
<option value="">- Select -</option>

</select>
<label>Section</label>
<select name="section" required id="section" class="form-control mb-2">
<option value="">- Select -</option>

</select>
<label>COVID-19 Vaccination</label>
<select name="vaccination" required class="form-control mb-2">
<option value="">- Select -</option>
<option value="Fully Vaccinated">Fully Vaccinated</option>
<option value="Partially Vaccinated">Partially Vaccinated</option>
<option value="Not Vaccinated">Not Vaccinated</option>
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
View Student
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Student&nbsp;Name</th>
<th>Roll&nbsp;No</th>
<th>Class</th>
<th>Section</th>
<th>Vaccination</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select student.id, roll_no, student.name, class.class_name, section.section_name, vaccination from student INNER JOIN class ON class.id=student.class_id INNER JOIN section ON section.id=student.section_id where class.school_id='".$clerk['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['class_name'];?></td>
<td><?php echo $row['section_name'];?></td>
<td><?php echo $row['vaccination'];?></td>
<td><a href="update_student.php?id=<?php echo $row['id'];?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a></td>
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
	$vaccination=$_POST['vaccination'];
	$name=$_POST['name'];
	$rollno=$_POST['rollno'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$sql="insert into student values('','$rollno','".$clerk['school_id']."','$class','$section','$name','$vaccination')";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>window.location.href='student.php'
		alert('Student Added Successfully')</script>";
	}
	else{
		echo "<script>window.location.href='student.php'
		alert('Sorry try again later')</script>";
	}
}
?>