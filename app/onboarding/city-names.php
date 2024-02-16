<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$search = $data['search'] ?? '';

$city = array();
if (empty($search)) {
    $query = mysqli_query($con,"select * from india_state_districts where state='Kerala' order by district ASC  ");
}else{
    $query = mysqli_query($con,"select * from india_state_districts where district LIKE'%$search%' ORDER BY 
    FIELD(state, 'Kerala') DESC ");
}

if($query && mysqli_num_rows($query)>0){
    while($result = mysqli_fetch_assoc($query)){
        $city[]=$result;
    }
    $msg = array("status" => true, "response"=>200,"message" =>"City name found!" ,"city"=>$city);  

}else{
    $msg = array("status" => false, "response"=>200,"message" =>"No items found!".mysqli_error($con));  
}
  



header('Content-Type: application/json');
print json_encode($msg);





?>


