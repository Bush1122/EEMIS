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
View Leave
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Teacher&nbsp;Name</th>
<th>Leave&nbsp;Date</th>
<th>Posted&nbsp;Date</th>
<th>Reason</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select name, from_date, to_date, date, reason from teacher_leave INNER JOIN teacher on teacher.employee_id=teacher_leave.teacher_id where school_id='".$principal['school_id']."'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['from_date']." To ".$row['to_date'];?></td>
<td><?php echo $row['date'];?></td>
<td><?php echo $row['reason'];?></td>
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