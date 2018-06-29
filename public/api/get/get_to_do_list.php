<?php

$query = 'SELECT `title`, `complete`, `id` FROM `to-do-list`'; 
$result = mysqli_query($conn, $query); 

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        // setting it to itself - complete key - is 0 which in php is a string/ truthy value 
        $row['complete'] = (bool) $row['complete']; 
        // empty square brackets are saying push into an empty array 
        $output['listItems'][]= $row; 
    }
    $output['success'] =true;
} else {
    $output['message'] = 'no to do items found'; 
}