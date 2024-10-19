<?php
include_once "session.php";
if(!empty($_POST["school_id"])){  
    $query = "SELECT * FROM subject WHERE school_id = ".$_POST['school_id'].""; 
    $result = $con->query($query); 
     
    if($result->num_rows > 0){ 
        echo '<option value="">- Select -</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'" required>'.$row['subject_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Subject not available</option>'; 
    } 
}
if(!empty($_POST["school_id_one"])){  
    $query1 = "SELECT * FROM class WHERE school_id = ".$_POST['school_id_one'].""; 
    $result1 = $con->query($query1); 
     
    if($result1->num_rows > 0){ 
        echo '<option value="">- Select -</option>'; 
        while($row1 = $result1->fetch_assoc()){  
            echo '<option value="'.$row1['id'].'" required>'.$row1['class_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Class not available</option>'; 
    } 
}
elseif(!empty($_POST["class_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM section WHERE class_id = ".$_POST['class_id'].""; 
    $result = $con->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">- Select -</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'" required>'.$row['section_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Section not available</option>'; 
    } 
} 
?>