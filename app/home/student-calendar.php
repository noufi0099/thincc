<?php
include_once('./common.php');
$con = open_con();



// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$batchId = $data['courseId'] ?? 0;
$month = $data['month'] ?? date('m');
$year = $data['year'] ?? date('Y');
$s_id=extract_cell('id','student_id',$studentId,'students');
$s_name=extract_cell('first_name','student_id',$studentId,'students');


if (empty($studentId) || empty($apiToken)  ) {

 $msg = array("status" => false,"response"=>400,"message"=>"Please provide valid parameters!");  

}
else
{

    $fdmonth = date("{$year}-{$month}-1");
    $ldmonth = date("{$year}-{$month}-t");

    

    $up_events_all= extractRecord('*','visibility','1','calender'," AND ( DATE(start) >= DATE('{$fdmonth}') AND DATE(start) <= DATE('{$ldmonth}') )  order by start asc");

  // $up_events_restricted= extractRecord('*','visiblity','2','calender',' AND (start > NOW() OR end > NOW() ) order by start limit 30');




    if(!is_array($up_events_all))
    {
        $up_events_data = array();

    }else{


        foreach ($up_events_all as $key => $value) {
            $datetime_now = new DateTime(); 
            $datetime_start = new DateTime($value["start"]); 
            $datetime_start->modify('+10 minutes');

            

            $instructors=array();
            $instructors[]=array(
                "id" => 1,
                "name" => "lorem ispum",
                "designation" => "BDES, NID",
                "profile_img" => "https://placehold.co/60x60"

            );

            $instructors[]=array(
                "id" => 2,
                "name" => "Gipsum ispum",
                "designation" => "BDES, IIT",
                "profile_img" => "https://placehold.co/60x60"

            );
            $up_events_data[] = array(

                "id" => $value["id"],
                "day" => $datetime_start->format('d'),
                "title" => $value["title"],
            "topic" => "NATA", //max 8 chars
            "start" => $value["start"],
            "end" => $value["end"],
            "status"=> matchLiterals($value["status"],array(1=>"ON",2=>"OFF",3=>"JOINFLAG",4=>"TILLEND") ),
            "is_joinBtn_available" => (($datetime_start->format('Y-m-d H:i:s ')>$datetime_now->format('Y-m-d H:i:s '))? 1 : 0 ),
            "jwt_token"=>"",
            "user_name"=> $s_name,
            "meeting_number"=> "12394",
            "password"=> "123456",
            "duration"=> timeToGo($value["start"]) ?? "0",
            "type"=> matchLiterals($value["type"],array(1=>"LIVE",2=>"EXAM",3=>"IMPORTANT",4=>"NORMAL",5=>"WEBINAR") ),
            "type_color"=> matchLiterals($value["type"],array(1=>"#E44444EB",2=>"#1FC0D6",3=>"#3AD841",4=>"#FFFFFF",5=>"#E1861A") ),
            "story"=> $value["story"],
            "thumbnail"=> $value["thumbnail"] ?? "https://placehold.co/60x60",
            "total_seats"=> $value["total_seats"] ?? 0,
            "instructors"=> $instructors





        );


        }
    }


    
    $msg = array("status" => true,"response"=>200,"message"=>"calender Data", "calendar" => $up_events_data);  


}







header('Content-Type: application/json');
print json_encode($msg);





?>


