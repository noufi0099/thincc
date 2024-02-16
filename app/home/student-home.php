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
$s_id=extract_cell('id','student_id',$studentId,'students');
$s_name=extract_cell('first_name','student_id',$studentId,'students');
$sections=array();

if (empty($studentId) || empty($apiToken) ) {

 $msg = array("status" => false,"response"=>400,"message"=>"Please provide valid parameters!");  

}
else
{

// subjects subscriptions 

 $courses_linked= extractRecord('*','batch_id',$batchId,'batch_course');

 $subjects_subscribed = array();
 $subjectsArr = array();


 function subjectArrfunc($subjectsArr,$courseId,$s_id,$batchId){
     $subjects_subscribed = array();

     $subjectsArr=joinTables('batch_student_subjects.*,subjects.*','batch_student_subjects','subjects','LEFT','batch_student_subjects.subject_id','subjects.id'," WHERE subjects.status=1 and subjects.display_flag=1 and batch_student_subjects.student_id='{$s_id}'   and (subjects.course_id IN ({$courseId}) OR  subjects.batch_id='{$batchId}' ) ");


     if(is_array($subjectsArr)){


        foreach ($subjectsArr[1] as $key => $value) {

            $subjects_subscribed[]=array(

                "id" => $value["id"],
                "subject_name" => $value["subject_name"],
                "max_watch_hours" => $value["max_watch_hours"],
                "is_chapter_no_random" => $value["displaychapterno"],
                "subject_type" => $value["type"],
                "batch_id" => $value["batch_id"],
                "thumbnail_img_url" => $value["img_url"],
                "course_id" => $value["course_id"]


            );



        }
        return $subjects_subscribed;

    }else{
        return [];
    }
}

if(is_array($courses_linked)){

    $cl=array();
    foreach ($courses_linked as $k => $v) {
        $cl[]=$v["course_id"];

    }
    $subjects_subscribed=array_merge($subjects_subscribed,subjectArrfunc($subjectsArr,implode(",",$cl),$s_id,$batchId));


}else{


    $courseId=0;

    $subjects_subscribed=subjectArrfunc($subjectsArr,$courseId,$s_id,$batchId);
}





$sections[] = array(
    "section_name"=>'subjects',
    "subjects"=>$subjects_subscribed
);


$live_classes= extractRecord('*','visibility','1','calender',' AND (start > NOW() OR end > NOW() ) AND type=1 order by start asc limit 30');



if(!is_array($live_classes))
{
    $up_events_live_data = array();

}else{


    foreach ($live_classes as $key => $value) {
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

        $up_events_live_data[] = array(

            "id" => $value["id"],
            "title" => $value["title"],
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
            "story"=> $value["story"],
            "thumbnail"=> $value["thumbnail"],
            "total_seats"=> $value["total_seats"] ?? 0,
            "instructors"=> $instructors




        );


    }
}



$sections[] = array(
    "section_name"=>'live_class_section',
    "live_classes"=>$up_events_live_data
);


    ## live test



$live_test= extractRecord('*','visibility','1','calender',' AND (start > NOW() OR end > NOW() ) AND type=1 order by start asc limit 30');



if(!is_array($live_test))
{
    $up_events_exam_data = array();

}else{


    foreach ($live_test as $key => $value) {
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

        $up_events_exam_data[] = array(

            "id" => $value["id"],
            "title" => $value["title"],
            "start" => $value["start"],

            "end" => $value["end"],
            "status"=> matchLiterals($value["status"],array(1=>"ON",2=>"OFF",3=>"JOINFLAG",4=>"TILLEND") ),
            "is_joinBtn_available" => (($datetime_start->format('Y-m-d H:i:s ')>$datetime_now->format('Y-m-d H:i:s '))? 1 : 0 ),
            
            // "url"=> $value["url"],
            "url"=> "https://placehold.co/660x660",
            "duration"=> timeToGo($value["start"]) ?? "0",
            "type"=> matchLiterals($value["type"],array(1=>"LIVE",2=>"EXAM",3=>"IMPORTANT",4=>"NORMAL",5=>"WEBINAR") ),
            "story"=> $value["story"],
            "thumbnail"=> $value["thumbnail"],
            "total_seats"=> $value["total_seats"] ?? 0,
            "instructors"=> $instructors




        );


    }
}


$sections[] = array(
    "section_name"=>'live_test',
    "live_test_list"=>$up_events_exam_data
);

    ## suggested courses
$suggestedCourses=array();




$batchesNotJoinedArr= extractRecord('*','status','1','batch','Order by batch_start_date ASC limit 5  ');



if(is_array($batchesNotJoinedArr)){

    foreach ($batchesNotJoinedArr as $k => $v) {


        $promolist= extractRecord('metaname,metacontent,transcode','referkey','batch','media_gallery'," AND referkeyid= '{$v['id']}' ");

        $promoslider= array();

        if(is_array($promolist))
        {
           foreach ($promolist as $key => $value) {
            $url=$value["metacontent"];


            if($value["metaname"]=="VIMEO")
            {
                if($value["transcode"])
                {
                   $l= json_decode($value["metacontent"]);
                   $url=$l->{"hls"};   
               }else{
                $url="";
            }

        }
        $promoslider[]= array(
            "type"=> $value["metaname"],
            "url" => $url

        );
    }

}


$courses_linked=joinTables('batch_course.*,courses.*','batch_course','courses','LEFT','batch_course.course_id','courses.id'," WHERE (courses.status=1 and courses.app_status=1) and batch_course.batch_id='{$v['id']}'");
$courses_linked_arr=array();

if(is_array($courses_linked)){


    foreach ($courses_linked[1] as $key => $value) {

       $lang=extract_cell('language_name','id',$value["language_medium"],'languages');

       $courses_linked_arr[]= array(
        "id"=> $value["course_id"],
        "title" => $value["course_name"],
        "description" => $value["course_summary"],
        "language" => $lang,
        "sell_price" => $value["course_fee_selling_price"]
    );

   }
}

$cg_name=extract_cell('course_group_name','id',$v["course_group_id"],'course_group');


$batcharr[] = array(
    "id" => $v['id'],
    "course_name" =>$v['batch_name'],
    "course_summary" =>$v['description'],
    "category_name"=>  $cg_name,
    "batch_type" =>$v['batch_type'],
    "course_fee_selling_price" =>$v['selling_price'],

    "thumbnail_img_url" =>$v['thumbnail_img_url'], 
    "max_student_count" => $v["max_student_count"],
    "promoslider" => $promoslider,
    "linked_courses"=>$courses_linked_arr
);  

}

}else{
    $batcharr= array();
} 

$sections[] = array(
    "section_name"=>'suggested_courses',
    "subjects"=>$batcharr
);


    ## Upcoming events


 // $sql_live_test = mysqli_query($con,"select student_events.*,notification_events.event_title 
//     from student_events
//     INNER JOIN notification_events on student_events.notification_event_id = notification_events.id
//     where student_id = '$studentId' 
//     order by id ASC limit 10   ");
// if($sql_live_test && mysqli_num_rows($sql_live_test)>0){
//     while($live_test_res = mysqli_fetch_assoc($sql_live_test)){
//         $up_events[] = $live_test_res;
//     }
// }

$up_events_all= extractRecord('*','visibility','1','calender',' AND (start > NOW() OR end > NOW() )  order by start asc limit 30');

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
            "title" => $value["title"],
            "start" => $value["start"],
            "end" => $value["end"],
            "status"=> matchLiterals($value["status"],array(1=>"ON",2=>"OFF",3=>"JOINFLAG",4=>"TILLEND") ),
            "is_joinBtn_available" => (($datetime_start->format('Y-m-d H:i:s ')>$datetime_now->format('Y-m-d H:i:s '))? 1 : 0 ),
            "user_name"=> $s_name,
            "meeting_number"=> $value['meeting_code'] ?? "",
            "password"=> $value['password'] ?? "",
            "duration"=> timeToGo($value["start"]) ?? "0",
            "type"=> matchLiterals($value["type"],array(1=>"LIVE",2=>"EXAM",3=>"IMPORTANT",4=>"NORMAL",5=>"WEBINAR") ),
            "story"=> $value["story"],
            "thumbnail"=> $value["thumbnail"],
            "total_seats"=> $value["total_seats"] ?? 0,
            "instructors"=> $instructors





        );


    }
}


$sections[] = array(
    "section_name"=>'upcoming_events',
    "events"=>$up_events_data
);



}

$popupmsg = array(
    "isEnabled"=> false,
    "isDismissible"=> false,
    "title"=> '',
    "message"=>'',
    "icon"=> ''
);



$msg = array("status" => true,"response"=>200,"message"=>"Student home page data", "sections" => $sections,"popupmsg"=>$popupmsg,"jwt_auth_zm"=> encodeZoomJwt());  


header('Content-Type: application/json');
print json_encode($msg);





?>


