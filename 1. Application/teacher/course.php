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
View Course
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Subject</th>
<th>Class</th>
<th>Section</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select subject.subject_name, class.class_name, section.section_name from teach INNER JOIN subject on subject.id=teach.subject_id INNER JOIN class ON class.id=teach.class_id INNER JOIN section ON section.id=teach.section_id where teach.teacher_id='".$teacher['employee_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['subject_name'];?></td>
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
</html>
<script>
$(document).ready(function(){
$('#data').DataTable();
});
</script>
