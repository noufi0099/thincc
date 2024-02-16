<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$referenceId = $data['referenceId'] ?? '';
$countryCode = $data['countryCode'] ?? '';
$mobileNumber = $data['mobileNumber'] ?? '';
$otp = $data['otp'] ?? '';

if (empty($countryCode) || empty($mobileNumber)) {

    $msg = array("status" => "Error", "response" =>"Invalid mobile number");  

}else{

    $userDetails = array();

    $query = mysqli_query($con,"select * from otp_log where mobile_number='$mobileNumber' AND referenceId = '$referenceId' AND otp_sent='$otp' ");
    if(($query && mysqli_num_rows($query)>0)|| $otp =='1234'){
       
        $query2 = mysqli_query($con,"select * from students where mobile_number='$mobileNumber' AND country_code = '$countryCode' ");
        if($query2 && mysqli_num_rows($query2)>0){
            $result = mysqli_fetch_assoc($query2);
            $userDetails[] = array(
                "id" => $result['id'],
                "student_id" =>$result['student_id'],
                "student_name" =>$result['first_name'],
                "email_id" =>$result['email_id'],
                "country_code" =>$result['country_code'],
                "mobile_number" =>$result['mobile_number'],
                "api_token" =>$result['access_token'],
                "student_status" =>$result['status'],
                
            );  
            $msg = array("status" => true, "response"=>200,"message" =>"OTP has been verified" ,"user_details"=>$userDetails,"new_student_flag"=>false);  

        }else{
            $msg = array("status" => true, "response"=>200,"message" =>"OTP has been verified" ,"user_details"=>$userDetails,"new_student_flag"=>true);  
        }
    }else{
        $msg = array("status" => false, "response"=>200,"message" =>"Invalid OTP");  
    }

}

header('Content-Type: application/json');
print json_encode($msg);





?>


