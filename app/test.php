<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');

// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

 
$param1 = $data['param1'];
echo $param1;


?>


