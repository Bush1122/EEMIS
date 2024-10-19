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
View Teacher
</div>
<div class="card-body">
<div class="table-responsive">
<table id="data" class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Teacher&nbsp;Name</th>
<th>School</th>
<th>District</th>
<th>CNIC</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=0;
$sql="select teacher.employee_id, name, school_name, district, cnic from teacher INNER JOIN school on school.school_id=teacher.school_id";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['school_name'];?></td>
<td><?php echo $row['district'];?></td>
<td><?php echo $row['cnic'];?></td>
<td style="width:5%;"><a href="update_teacher.php?id=<?php echo $row['employee_id'];?>"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button></a></td>
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