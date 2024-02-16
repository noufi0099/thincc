<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$countryCode = $data['countryCode'] ?? '';
$mobileNumber = $data['mobileNumber'] ?? '';

if (empty($countryCode) || empty($mobileNumber)) {

    $msg = array("status" => "Error", "response" =>"Invalid mobile number");  

}else{

    $smsotp = rand(1000,9999);
    $referenceId=uniqid();

    $sql = mysqli_query($con,"insert into otp_log
    (referenceId, country_code,  mobile_number, otp_sent) values(
        '$referenceId','$countryCode','$mobileNumber','$smsotp')");

    $otp = array();
    $otp[] = array(
        "reference_id" => $referenceId,
        "mobile_number" =>$countryCode.$mobileNumber 
    );

    $msg = array("status" => true, "response"=>200,"message" =>"OTP has been sent to ".$countryCode.$mobileNumber  ,"otp"=>$otp);  
}

header('Content-Type: application/json');
print json_encode($msg);





?>


