<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';

 

if (empty($studentId) || empty($apiToken) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{

    $query = mysqli_query($con,"
        DELETE from students 
        WHERE 
        student_id='$studentId' AND access_token='$apiToken'
        
    ");

    if($query && mysqli_affected_rows($con) > 0){
        $msg = array("status" => true,"response"=>200,"message"=>"Account has been deleted!");  
    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"Deletion Failed." . mysqli_error($con));  
    }
}
header('Content-Type: application/json');
print json_encode($msg);





?>


