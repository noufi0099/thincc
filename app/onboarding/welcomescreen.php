<?php
include_once('./common.php');
$con = open_con();

$sliders = array();

$sliders[] = array(
    "id" => 1,
    "url" =>ROUTER_URL."/lp/imgserver/uploads/icons/intro.png",
    "title"=>"Easy access to learnings",
    "body"=>"Ready to get started? Register as a new user!"
);
$sliders[] = array(
    "id" => 2,
    "url" =>ROUTER_URL."/lp/imgserver/uploads/icons/intro.png",
    "title"=>"Easy access to learnings",
    "body"=>"Ready to get started? Register as a new user!"
);
$sliders[] = array(
    "id" => 3,
    "url" =>ROUTER_URL."/lp/imgserver/uploads/icons/intro.png",
    "title"=>"Easy access to learnings",
    "body"=>"Ready to get started? Register as a new user!"
);



$msg = array("status" => true,"response"=>200,"message"=>"Intro slider images", "intro_sliders" => $sliders);  

header('Content-Type: application/json');
print json_encode($msg);

?>


