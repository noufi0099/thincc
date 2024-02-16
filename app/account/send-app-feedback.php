<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$feedback = $data['feedback'] ?? '';

 

if (empty($studentId) || empty($apiToken)|| empty($feedback) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{

    $query = mysqli_query($con,"
        insert into customer_feedbacks (
            student_id,
            feedback
        ) 
        values(
            '$studentId',
            '$feedback'
        ) 
    ");

    if($query){
        $msg = array("status" => true,"response"=>200,"message"=>"Your feedback has been submitted.");  
    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"Submission Failed." . mysqli_error($con));  
    }
}
header('Content-Type: application/json');
print json_encode($msg);





?>


