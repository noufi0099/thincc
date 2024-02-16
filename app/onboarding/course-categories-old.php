<?php
include_once('./common.php');
$con = open_con();

$query_group = mysqli_query($con,"select course_group.*, users.staff_name,users.notes,users.profileImage from course_group
inner join users on course_group.mentor_id = users.id ");

if($query_group && mysqli_num_rows($query_group)>0){
    while($resultMain = mysqli_fetch_assoc($query_group)){

        $courseGroupId = $resultMain['id'];
        $courseDetails = array(); // Initialize $courseDetails for each course group

// get the course details 

        $query1 = mysqli_query($con,"select courses.*,languages.language_name from courses
        left join languages on courses.language_medium = languages.id 
        where courses.course_group_id='$courseGroupId' ");


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

        $group[] = array(
            "id" => $resultMain['id'],
            "category_name"=> $resultMain['course_group_name'],
            "sub_title"=> $resultMain['overview'],
            "url" => $resultMain['thumbnail_url'],
            "mentor_name" => $resultMain['staff_name'],
            "mentor_details" => $resultMain['notes'],
            "mentor_image_url" => $resultMain['profileImage'],
            "courses"=>$courseDetails
            
        ); 
        reset($courseDetails);
    
    }

}



$msg = array("status" => true,"response"=>200,"message"=>"Course master categories", "course_groups" => $group);  

header('Content-Type: application/json');
print json_encode($msg);

?>


