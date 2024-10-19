<?php
include_once "../dbc.php";
include_once "session.php";
if($_POST['type']== ""){
	
$sql="select * from class where school_id='".$head['school_id']."' AND section='".$head['section']."'";
$result=mysqli_query($con,$sql);
$str="";
while($row=mysqli_fetch_array($result)){
	$str.="<option value='{$row['id']}'>{$row['class_name']}</option>";
	
	
}
}
else if($_POST['type']== "sectionData"){
	
$sql="select * from section where class_id={$_POST['id']}";
$result=mysqli_query($con,$sql);
$str="";
while($row=mysqli_fetch_array($result)){
	$str.="<option value='{$row['id']}'>{$row['section_name']}</option>";
	
	
}
	
}


echo $str;

?>