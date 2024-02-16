<?php
include_once('./common.php');
$con = open_con();



// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';
$batchId = $data['courseId'] ?? '';
$subjectId = $data['subjectId'] ?? '';
$s_id=extract_cell('id','student_id',$studentId,'students');

if (empty($studentId) || empty($apiToken) || empty($subjectId) || empty($batchId) ) {

    $msg = array("status" => 500, "response" =>"Please provide valid parameters");  

}else{

    $expired =1; 
    $is_demo_user=1;

    $expiry_check= extractRecord('*','batch_id',$batchId,'batch_student'," AND student_id={$s_id} ");

    if(is_array($expiry_check)){

     $course_expiry_date = $expiry_check[0]['expired_on'];
     $is_demo_user = $expiry_check[0]['is_demo_user'];
 
     $date_now = new DateTime();
     $date_expiry    = new DateTime($course_expiry_date);
     if ($date_now > $date_expiry) {
        $expired =1;
    }else{
        $expired =0;
    }

}else{
    $play_status=0;
}


$totalChaptersCount = 0;
$chapter_list=array();
$playlist = array();

$subject_details= extractRecord('*','id',$subjectId,'subjects'," AND status=1 and display_flag=1 order by sort_order ASC ");

$chapters_arrlist= extractRecord('*','subject_id',$subjectId,'course_subject_chapters'," AND status=1 order by sort_order ASC ");

if(!is_array($chapters_arrlist))
{
    $chapter_list = array();

}else{
    $totalChaptersCount=count($chapters_arrlist);
    
    foreach ($chapters_arrlist as $key => $value) {

     $chapter = $value['chapter_no'];
     $asset_arrlist= extractRecord('*','chapter_number',$value["id"],'study_materials'," AND status=1 order by sort_order ASC ");
     if(!is_array($asset_arrlist))
     {
        $playlist = array();

    }else{
     foreach ($asset_arrlist as $k => $v) {



         $is_available_for_demo = $v['is_available_for_demo'];
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
                $play_status = 1; //trial

        $duration_in_seconds = $v['duration_in_seconds'];
        $playbackDuration =  gmdate("i:s", $duration_in_seconds);
        $playlist[] = array(
            'content_id'=>$v['id'],
            'content_type'=>matchLiterals($v["content_type"],array(1=>"VIDEO",2=>"PDF",3=>"WEB") ),
            'chapter_id'=> $v['chapter_number'],
            'section_heading'=>$v['section_heading'],
            'video_hls_url'=>$v['video_hls_url'], 
            'vimeo_id'=>$v['vimeo_id'],
            'cover_image'=>$v['vimeo_thumbnail'], 
            // 'post_date'=>date('d-M-Y',strtotime($v['post_date'])),
            'available_to_play'=>$play_status,
            'material_type'=>$v['content_type'],
            'pdf_file_url'=>$v['pdfFileUrl'],
            'web_url'=>$v['web_url'],
            'playback_duration'=>$playbackDuration." : mins"
        );


    }


}


$chapter_list[]=array(
    'chapter_id'=>$value['id'],
    'chapterNo'=>(($subject_details[0]['displaychapterno'])? $v['chapter_no'] : ($key+1)),
    'chapterName'=>$value['chapter_name'],
    'playlist'=>$playlist
);




}





}



$sections[] = array(
    "sectionName"=>'videos',
    "chapters"=>$chapter_list
);


$msg = array("status" => true,"response"=>200,"message"=>"Subject video Materials", "sections" => $sections);  




}



header('Content-Type: application/json');
print json_encode($msg);





?>


