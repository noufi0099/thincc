<?php
include_once('./common.php');
$con = open_con();



// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$courseId = $data['courseId'] ?? '';
$subjectId = $data['subjectId'] ?? '';
$chapterNo = $data['chapterNo'] ?? '';

if (empty($studentId) || empty($apiToken) || empty($subjectId) || empty($courseId) ) {

    $msg = array("status" => "Error", "response" =>"Please provide valid parameters");  

}else{



        // expiry check
        $expired =1; $is_demo_user=1;

        $expiry_check = mysqli_query($con,"select * from student_courses where course_id='$courseId' AND student_id='$studentId' ");
        if($expiry_check && mysqli_num_rows($expiry_check)>0){
            $res = mysqli_fetch_assoc($expiry_check);
            $course_expiry_date = $res['expired_on'];
            $is_demo_user = $res['is_demo_user'];

            $date_now = new DateTime();
            $date2    = new DateTime($course_expiry_date);
            if ($date_now > $date2) {
                $expired =1;
            }else{
                $expired =0;
            }

        }else{
            $play_status=0;
        }





        // subject_stories

        $stories=array();
        $stories_sql = mysqli_query($con,"select subject_stories.* from subject_stories where  
        course_id='$courseId' AND subject_id='$subjectId' order by id desc limit 10  " );

        // AND date(expire_on)>date(now()) 
        ## add this above code when product is live. 
            if($stories_sql && mysqli_num_rows($stories_sql)>0){
                while($data = mysqli_fetch_assoc($stories_sql)){
                    $stories[] = $data;
                }
            }


        
        $sections[] = array(
            "section_name"=>'stories',
            "story_list"=>$stories
        );


        $msg = array("status" => true,"response"=>200,"message"=>"Subject Stories", "sections" => $sections);  

}



header('Content-Type: application/json');
print json_encode($msg);





?>


