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

        $tips=array();
        $tips_sql = mysqli_query($con,"select think_tips.* from think_tips where  
        course_id='$courseId'  order by id desc limit 1  " );

            if($tips_sql && mysqli_num_rows($tips_sql)>0){
                $data = mysqli_fetch_assoc($tips_sql);
                $tips[] = $data;
            }


        
        $sections[] = array(
            "section_name"=>'tips',
            "tips"=>$tips
        );


        $msg = array("status" => true,"response"=>200,"message"=>"Homepage Tips", "sections" => $sections);  

}



header('Content-Type: application/json');
print json_encode($msg);





?>


