<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$courseGroupId = $data['courseGroupId'] ?? '';
$apiToken = $data['apiToken'] ?? '';

if (empty($courseGroupId) || empty($apiToken) ) {

    $msg = array("status" => "Error", "response" =>"Please provide valid parameters");  

}else{

    $query_group = mysqli_query($con,"select course_group.*, users.staff_name,users.notes,users.profileImage from course_group
    inner join users on course_group.mentor_id = users.id
     where course_group.id='$courseGroupId' ");

    if($query_group && mysqli_num_rows($query_group)>0){
        $result = mysqli_fetch_assoc($query_group);
        $group[] = array(
            "id" => $result['id'],
            "category_name"=> $result['course_group_name'],
            "sub_title"=> $result['overview'],
            "url" => $result['thumbnail_url'],
            "mentor_name" => $result['staff_name'],
            "mentor_details" => $result['notes'],
            "mentor_image_url" => $result['profileImage'],
            
        ); 

    $query1 = mysqli_query($con,"select courses.*,languages.language_name from courses
    left join languages on courses.language_medium = languages.id 
     where courses.course_group_id='$courseGroupId' ");
     $courseDetails = array();
        if($query1 && mysqli_num_rows($query1)>0){
            while($result = mysqli_fetch_assoc($query1)){
                $courseDetails[] = array(
                    "id" => $result['id'],
                    "course_name" =>$result['course_name'],
                    "course_summary" =>$result['course_summary'],
                    "course_short_notes" =>$result['course_short_notes'],
                    "nick_name" =>$result['nick_name'],
                    "language_name" =>$result['language_name'],
                    "course_fee_mrp" =>$result['course_fee_mrp'],
                    "course_fee_selling_price" =>$result['course_fee_selling_price'],
                    "gst_percentage" =>$result['gst_percentage'],
                    "gst_amount" =>$result['gst_amount'],
                    "thumbnail_img_url" =>$result['thumbnail_img_url'],
                    "video_thumbnail_url" =>$result['video_thumbnail_url'],
                    "course_display_icon" =>$result['course_display_icon']
                    
                );  
            }
            
        } 

        $msg = array("status" =>true,"response"=>200,"message"=>"Course details" ,"group_details"=>$group,"course_details"=>$courseDetails);  
    }else{
        $msg = array("status" =>false,"response"=>200, "message" =>"Some errors occured-".mysqli_error($con) );  
    }

}
header('Content-Type: application/json');
print json_encode(array("attributes" => $msg));





?>


