<?php
include_once('./common.php');
$con = open_con();

$categories = array();

$categories[] = array(
    "courseGroupId" => 1,
    "categoryName"=>'Architecture',
    "subTitle"=>'Lorem Ipsum',
    "url" =>ROUTER_URL."/dev/public/cat01.png"
);
$categories[] = array(
    "courseGroupId" => 2,
    "categoryName"=>'Design',
    "subTitle"=>'Lorem Ipsum',
    "url" =>ROUTER_URL."/dev/public/cat02.png"
);
$categories[] = array(
    "id" => 3,
    "categoryName"=>'Arc + Design',
    "subTitle"=>'Lorem Ipsum',
    "url" =>ROUTER_URL."/dev/public/cat01.png"
);
$categories[] = array(
    "courseGroupId" => 5,
    "categoryName"=>'Doodling',
    "subTitle"=>'Lorem Ipsum',
    "url" =>ROUTER_URL."/dev/public/cat03.png"
);
$categories[] = array(
    "courseGroupId" => 4,
    "categoryName"=>'Drawing',
    "subTitle"=>'Lorem Ipsum',
    "url" =>ROUTER_URL."/dev/public/cat04.png"
);
 

$msg = array("status" => true,"response"=>200,"message"=>"Course master categories", "courseGroups" => $categories);  

header('Content-Type: application/json');
print json_encode($msg);

?>


