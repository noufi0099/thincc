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

if (empty($studentId) || empty($apiToken) ) {

    $msg = array("status" => "Error", "response" =>"Please provide valid parameters");  

}else{
        
$favlist = array();
    
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



            $favsql = mysqli_query($con,"select study_materials.*,study_materials.id as matId
            from study_materials 
            right join student_favorites on study_materials.id = student_favorites.content_id
            where
            student_favorites.student_id='$studentId'
            
            ");

            if( $favsql && mysqli_num_rows($favsql)>0){
                while($mat = mysqli_fetch_assoc($favsql)){
    
    
                    $is_available_for_demo = $mat['is_available_for_demo'];
                    if($is_demo_user==1 ){
                        if($expired !=1 && $is_available_for_demo==1){
                            $play_status = 1; 
                        }else{
                            $play_status = 0; 
                        }            
                    }else{            
                        if($expired !=1 ){
                            $play_status = 1; 
                        }else{
                            $play_status = 0; 
                        }
                    }

                    $duration_in_seconds = $mat['duration_in_seconds'];
                    $playbackDuration =  gmdate("i:s", $duration_in_seconds);
                    $favlist[] = array(
                        'content_id'=>$mat['matId'],
                        'chapter_number'=>$mat['chapter_number'],
                        'part_no'=>$mat['part_no'],
                        'section_heading'=>$mat['section_heading'],
                        'video_hls_url'=>$mat['video_hls_url'], 
                        'vimeo_id'=>$mat['vimeo_id'],
                        'cover_image'=>$mat['vimeo_thumbnail'], 
                        'post_date'=>date('d-M-Y',strtotime($mat['post_date'])),
                        'available_to_play'=>$play_status,
                        'pdf_file_url'=>$mat['pdfFileUrl'],
                        'web_url'=>$mat['web_url'],
                        'playback_duration'=>$playbackDuration." : mins"
                    );
    
                }
                
            }













 


        $msg = array("status" => true,"response"=>200,"message"=>"favlist", "favlist" => $favlist);  

}



header('Content-Type: application/json');
print json_encode($msg);





?>


