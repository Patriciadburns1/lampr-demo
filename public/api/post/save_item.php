<?php 
$title=$_POST['title'];
$details=$_POST['details'];

if(!$title){
    $output['error'][] ="no title found"; 
}

if (!$details){
    $output['error'][] ="no details found"; 
}

if(empty($output['errors'])){
    $query = " INSERT INTO `to-do-list`(`title`, `details`) VALUES ('$title', '$details') ";
}

$result = mysqli_query($conn,$query); 

if(mysqli_affected_rows($conn)>0){
    $output['success'] = true; 
    $output['insertID'] = mysqli_insert_id($conn);     
}
else{
    $output['errors'][]= "error inserting item"; 
}