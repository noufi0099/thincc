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



        // chapters

        /// get total number of chapters in a subject 
        $totalChapterScount = 0;
        $chatersArray=array();
        $chapters_sql = mysqli_query($con,"select *
        from course_subject_chapters 
        where
        course_subject_chapters.status=1 and 
        course_subject_chapters.subject_id='$subjectId'  order by sort_order ASC 
        ");
        if($chapters_sql && mysqli_num_rows($chapters_sql)>0){
            while($res1 = mysqli_fetch_assoc($chapters_sql)){
                $totalChapterScount ++;
                $chapter = $res1['chapter_no'];

                $materials_play_list = mysqli_query($con,"select study_materials.*,study_materials.id as matId,
                (case WHEN content_type=1 THEN 'video' WHEN content_type=3 THEN 'web' else 'pdf' end) as docType
                from study_materials 
                where
                study_materials.status=1 AND 
                subject_id='$subjectId' AND
                chapter_number='$chapter' AND 
                study_materials.course_id = '$courseId' order by sort_order ASC ");

                if( $materials_play_list && mysqli_num_rows($materials_play_list)>0){
                    while($mat = mysqli_fetch_assoc($materials_play_list)){
        
        
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
                        $playlist[] = array(
                            'content_id'=>$mat['matId'],
                            'chapter_number'=>$mat['chapter_number'],
                            'part_no'=>$mat['part_no'],
                            'section_heading'=>$mat['section_heading'],
                            'video_hls_url'=>$mat['video_hls_url'], 
                            'vimeo_id'=>$mat['vimeo_id'],
                            'cover_image'=>$mat['vimeo_thumbnail'], 
                            'post_date'=>date('d-M-Y',strtotime($mat['post_date'])),
                            'available_to_play'=>$play_status,
                            'material_type'=>$mat['docType'],
                            'pdf_file_url'=>$mat['pdfFileUrl'],
                            'web_url'=>$mat['web_url'],
                            'playback_duration'=>$playbackDuration." : mins"
                        );
        
                    }
                    
                }

                

                $chatersArray[]=array(
                    'chapterNo'=>$res1['chapter_no'],
                    'chapterName'=>$res1['chapter_name'],
                    'playlist'=>$playlist
                );

            }
        }



        // videos

        $sections[] = array(
        "sectionName"=>'videos',
        "chapters"=>$chatersArray
        );




### subject Stories 



$msg = array("status" => true,"response"=>200,"message"=>"Subject video Materials", "sections" => $sections);  




}



header('Content-Type: application/json');
print json_encode($msg);





?>


