<?php
include_once('./common.php');
$con = open_con();



// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$courseId = $data['courseId'] ?? '';

if (empty($studentId) || empty($apiToken) || empty($courseId) ) {

    $msg = array("status" => "Error", "response" =>"Please provide valid parameters");  

}else{
        // homepage tips

        $exams=array();
        $exam_sql = mysqli_query($con,"select exam_notifications.* from exam_notifications where  
        course_id='$courseId'  order by id desc limit 25  " );

            if($exam_sql && mysqli_num_rows($exam_sql)>0){
                while($data = mysqli_fetch_assoc($exam_sql)){
                    $exams[] = $data;
                }
            }


        
        $sections[] = array(
            "section_name"=>'exam_notifications',
            "notifications"=>$exams
        );


        $msg = array("status" => true,"response"=>200,"message"=>"Exam Notifications", "sections" => $sections);  

}



header('Content-Type: application/json');
print json_encode($msg);





?>


