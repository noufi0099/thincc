<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';

$notificationId = $data['notificationId'] ?? '';


if (empty($notificationId) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{

    $query = mysqli_query($con,"
        UPDATE students  SET 
        notification_id='$notificationId' 
        WHERE 
        student_id='$studentId' AND access_token='$apiToken'
        
    ");

    if($query && mysqli_affected_rows($con) > 0){
        $msg = array("status" => true,"response"=>200,"message"=>"Notification id has been updated!");  
    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"Nothing to update.");  
    }

   
 

}
header('Content-Type: application/json');
print json_encode( $msg);





?>


