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
View Student
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>School</th>
<th>Student&nbsp;Name</th>
<th>Roll&nbsp;No</th>
<th>Class</th>
<th>Section</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select student.id, roll_no, school_name, district, student.name, class.class_name, section.section_name from student INNER JOIN class ON class.id=student.class_id INNER JOIN section ON section.id=student.section_id INNER JOIN school on school.school_id=student.school_id";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['district'];?></td>
<td><?php echo $row['school_name'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['roll_no'];?></td>
<td><?php echo $row['class_name'];?></td>
<td><?php echo $row['section_name'];?></td>
<td style="width:5%;"><a href="update_student.php?id=<?php echo $row['id'];?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a></td>
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
	$name=$_POST['name'];
	$rollno=$_POST['rollno'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$sql="insert into student values('','$rollno','".$clerk['school_id']."','$class','$section','$name')";
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