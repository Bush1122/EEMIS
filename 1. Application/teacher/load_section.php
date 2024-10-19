<?php
include_once "../dbc.php";
include_once "session.php";
if($_POST['type']== ""){
	
$sql="select class.id, class.class_name from teach INNER JOIN class ON class.id=teach.class_id where teach.teacher_id='".$teacher['employee_id']."'";
$result=mysqli_query($con,$sql);
$str="";
while($row=mysqli_fetch_array($result)){
	$str.="<option value='{$row['id']}'>{$row['class_name']}</option>";
	
	
}
}
else if($_POST['type']== "sectionData"){
	
$sql="select section.id, section.section_name from teach INNER JOIN section ON section.id=teach.section_id where teach.class_id={$_POST['id']} AND teach.teacher_id='".$teacher['employee_id']."'";
$result=mysqli_query($con,$sql);
$str="";
while($row=mysqli_fetch_array($result)){
	$str.="<option value='{$row['id']}'>{$row['section_name']}</option>";
	
	
}
	
}


echo $str;

?>