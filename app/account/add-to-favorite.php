<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$course_id = $data['course_id'] ?? '';
$subject_id = $data['subject_id'] ?? '';
$content_id = $data['content_id'] ?? '';
 

if (empty($studentId) || empty($apiToken)|| empty($content_id) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{

    $query = mysqli_query($con,"
        insert into student_favorites (
            student_id,
            course_id,
            subject_id,
            content_id 
        ) 
        values(
            '$studentId',
            '$course_id',
            '$subject_id',
            '$content_id' 
        ) 
    ");

    if($query){
        $msg = array("status" => true,"response"=>200,"message"=>"Added to your Fav list");  
    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"Failed." . mysqli_error($con));  
    }
}
header('Content-Type: application/json');
print json_encode($msg);





?>


