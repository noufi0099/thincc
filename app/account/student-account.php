<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$s_id=extract_cell('id','student_id',$studentId,'students');

if (empty($studentId) || empty($apiToken) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{
    $subscriptions = array();
    $profile_data = array();

    // get student details 

    $sql1 = mysqli_query($con,"select * from students where access_token='$apiToken' AND student_id='$studentId' ");
    
    if($sql1 && mysqli_num_rows($sql1)>0){
        $res = mysqli_fetch_assoc($sql1);
        $profile_data = $res;

       
        $subscribed=joinTables('batch_student.*,batch.*','batch_student','batch','INNER','batch_student.batch_id','batch.id'," WHERE (batch.status > 0 and batch.app_display=1) and batch_student.student_id= {$s_id}  ");

        $subscription_data = array();

        if (is_array($subscribed[1])) {
            
            foreach ($subscribed[1] as $key => $value) {

                $datetime_start = new DateTime($value["batch_start_date"]); 
                $current_date = new DateTime(); 

                $datetime_start->modify("+{$value['batch_duration']} days");
                $expiry_date = $datetime_start->format('Y-m-d');
                $expiry_datetime = $datetime_start->format('Y-m-d H:i:s ');
                $current_date = $current_date->format('Y-m-d H:i:s ');
                $isExpired = $current_date > $expiry_datetime ? true : false;


                $subscription_data[]= array(
                    'batchId' =>$value['batch_id'],
                    'batchName' =>$value['batch_name'],
                    'expiryOn' => $expiry_date,
                    'duration' => timeToGo($expiry_datetime) ?? "0",
                    'progress' =>75,
                    'progressColor' =>"#E1861A",
                    'isExpired' =>$isExpired,
                    'expiryFc' =>"#AFAFAF",
                    'expiryBgc' =>"#eceaea"

                );

            }


            $subscription_data[]= array(
                "batchId"=> "2",
                "batchName" => "DESIGN REPEATER BATCH 2024",
                "expiryOn" => "2024-01-01",
                "duration" => "Expired",
                "progress" => 75,
                "progressColor" => "#E1861A",
                "isExpired" => true,
                "expiryFc" => "#AFAFAF",
                "expiryBgc" => "#eceaea"

            );
             

        }


        

 

        $msg = array("status" => true,"response"=>200,"message"=>"Student profile details!","profile"=>$profile_data,"subscriptions"=>$subscription_data);  

    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"No records foundfor this customer!");  
    }


}
header('Content-Type: application/json');
print json_encode(array("attributes" => $msg));





?>


