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

    $msg = array("status" => "Error", "response" =>"Please provide valid parameters");  

}else{
        // homepage tips

        $notifications=array();
        $notifications_sql = mysqli_query($con,"select notification_logs.*,notification_log_type.type_name,
        notification_log_type.logo_url
        from notification_logs
        inner join notification_log_type on notification_logs.notification_type = notification_log_type.id
        where  
        notification_logs.student_id='$studentId'  order by id desc limit 25  " );

            if($notifications_sql && mysqli_num_rows($notifications_sql)>0){
                while($data = mysqli_fetch_assoc($notifications_sql)){
                    $notifications[] = $data;
                }
            }


        
        $sections[] = array(
            "section_name"=>'notifications',
            "notifications_list"=>$notifications
        );


        $msg = array("status" => true,"response"=>200,"message"=>"Student Notifications", "sections" => $sections);  

}



header('Content-Type: application/json');
print json_encode($msg);





?>


