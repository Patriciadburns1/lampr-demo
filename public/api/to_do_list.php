<?php
//allow cross origin request 
header('Access-Control-Allow-Origin: *');


// $data= file_get_contents('php://input'); 
// $data = json_decode($data, true); 

// echo '<pre>';
// print_r($data['name']);
// echo '</pre>';

// echo '<pre>';
// print_r($_SERVER['REQUEST_METHOD']);
// echo '</pre>';


// set up an output variable // under this line where real set up is happening 
// lot less cases where success is true, only place where success is true - saves typing 
$output =[
    'success' => false  
]; 

require_once('db_connect.php'); 

$method = $_SERVER['REQUEST_METHOD']; 
$action = $_GET['action']; 

switch($method){
    case 'GET':
        // $output['msg']= 'GET method used'; 
        // php includes the file and runs it like one file 
        include_once("get/$action.php"); 
        break; 
    case 'POST':
        // $output['msg']= 'POST method used'; 
        // $path ="post/$action.php"; 
        include_once("post/$action.php"); 
        break; 
    case 'PATCH':
        $_PATCH=json_decode(file_get_contents('php://input'), true); 
        include_once("patch/$action.php"); 
        break; 
    case 'PUT':
        $output['msg']= 'PUT method used'; 
        break;
    case 'DELETE':
        $output['msg']= 'Delete method used'; 
        break;
    default: 
    $output['error'] = "Unknown request method: $method ";
}


// if (is_file($path)){
//     include_once($path);
// }
// else{
//     $output['error'] = "unknown action : $action " ; 
// }


//json encode for frontend 
print json_encode($output); 

