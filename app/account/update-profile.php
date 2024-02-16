<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';

$first_name = $data['studentName'] ?? '';
$country_code = $data['countryCode'] ?? '';
$mobile_number = $data['mobileNumber'] ?? '';
$email_id = $data['emailId'] ?? '';
$district = $data['district'] ?? '';



if (empty($studentId) || empty($apiToken)  || empty($first_name) || empty($mobile_number) || empty($email_id) ) {

    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  

}else{

    $query = mysqli_query($con,"
        UPDATE students  SET 
        first_name='$first_name' ,
        country_code='$country_code',
        mobile_number='$mobile_number',
        email_id='$email_id',
        district='$district'
        WHERE 
        student_id='$studentId' AND access_token='$apiToken'
        
    ");

    if($query && mysqli_affected_rows($con) > 0){
        $profile_data = array();
        // get student details 
    
        $sql1 = mysqli_query($con,"select * from students where access_token='$apiToken' AND student_id='$studentId' ");
        if($sql1 && mysqli_num_rows($sql1)>0){
            $res = mysqli_fetch_assoc($sql1);
            $profile_data = $res;
            $msg = array("status" => true,"response"=>200,"message"=>"Student profile has been updated!","profile"=>$profile_data);  
    
        }else{
            $msg = array("status" => false,"response"=>200,"message"=>"No records foundfor this customer!");  
        }

    }else{
        $msg = array("status" => false,"response"=>200,"message"=>"Updation Failed." . mysqli_error($con));  
    }

   
 

}
header('Content-Type: application/json');
print json_encode($msg);





?>


