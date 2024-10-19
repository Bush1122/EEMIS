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
<th>Student&nbsp;Name</th>
<th>Roll&nbsp;No</th>
<th>Class</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select roll_no, student.name, class.class_name, section.section_name from student INNER JOIN class ON class.id=student.class_id INNER JOIN section ON section.id=student.section_id where class.school_id='".$principal['school_id']."'";
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
</script>