<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$first_name = $data['studentName'] ?? '';
$country_code = $data['countryCode'] ?? '';
$mobile_number = $data['mobileNumber'] ?? '';
$email_id = $data['emailId'] ?? '';
$district = $data['district'] ?? '';
$class = $data['class'] ?? '';
$devicePlatform = $data['devicePlatform'] ?? '';
$deviceName = $data['deviceName'] ?? '';
$deviceModel = $data['deviceModel'] ?? '';
$app_version_code = $data['appVersionCode'] ?? '';
$app_uuid = $data['app_uuid'] ?? '';
 
 

$access_code = uniqid();
$student_id  = "TNK".time().rand(0,999);

function generateCustomerID() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $customerID = '';

    for ($i = 0; $i < 8; $i++) {
        $customerID .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $customerID;
}

$uniqueCustomerID = generateCustomerID();


if (empty($first_name) || empty($mobile_number) || empty($email_id)) {

    $msg = array("status" => false, "response" =>"Please enter all the details to register");  

}else{

    $userDetails = array();

    $query = mysqli_query($con,"
        INSERT INTO students (access_token,student_id,first_name, country_code, mobile_number, email_id, district, class, devicePlatform, deviceName, deviceModel, app_version_code, app_uuid,referral_code)
        VALUES ('$access_code','$student_id','$first_name', '$country_code', '$mobile_number', '$email_id', '$district', '$class', '$devicePlatform', '$deviceName', '$deviceModel', '$app_version_code', '$app_uuid','$uniqueCustomerID');    
    ");
    if($query){
        $msg = array("status" => true, "response"=>200,"message" =>"Registration Done!","access_token"=>$access_code,"student_id"=>$student_id);  
    }else{
        $msg = array("status" => false, "response"=>200,"message" =>"Custome already registered or some other errors occured.".mysqli_error($con));  
    }

}

header('Content-Type: application/json');
print json_encode($msg);





?>


