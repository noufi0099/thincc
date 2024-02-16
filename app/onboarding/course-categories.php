<?php
include_once('./common.php');
$con = open_con();

$resp=200;

$query_group = mysqli_query($con,"select course_group.*, profiles.name,profiles.story,profiles.image,profiles.designation from course_group
    inner join profiles on course_group.mentor_id = profiles.id ");

if($query_group && mysqli_num_rows($query_group)>0){
    while($resultMain = mysqli_fetch_assoc($query_group)){

        $courseGroupId = $resultMain['id'];
        $batcharr = array(); 

        
        $query1 = mysqli_query($con,"select * from batch 
            where (app_display=1 and status IN (1,2,3,4)) and course_group_id='{$courseGroupId}' ");


        if($query1 && mysqli_num_rows($query1)>0){
            while($result = mysqli_fetch_assoc($query1)){

                $promolist= extractRecord('metaname,metacontent,transcode','referkey','batch','media_gallery'," AND referkeyid= '{$result['id']}' ");

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


        $courses_linked=joinTables('batch_course.*,courses.*','batch_course','courses','LEFT','batch_course.course_id','courses.id',' WHERE (courses.status=1 and courses.app_status=1) and batch_course.batch_id="'.$result['id'].'"  ');
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

             $blang=extract_cell('language_name','id',$result["language_medium"],'languages');

     $batcharr[] = array(
        "id" => $result['id'],
        "course_name" =>$result['batch_name'],
        "course_summary" =>$result['description'],
        "category_name"=> $resultMain['course_group_name'],
        "batch_type" =>matchLiterals($result['batch_type'],array(1=>"SINGLE",2=>"BUNDLE",3=>"LANGVERSION") ),
        "course_fee_selling_price" =>$result['selling_price'],
        "language" => $blang,
        "thumbnail_img_url" =>$result['thumbnail_img_url'], 
        "max_student_count" => $result["max_student_count"],
        "promoslider" => $promoslider,
        "linked_courses"=>$courses_linked_arr


    );  
 }

} 

$group[] = array(
    "id" => $resultMain['id'],
    "category_name"=> $resultMain['course_group_name'],
    "sub_title"=> $resultMain['overview'],
    "url" => $resultMain['thumbnail_url'],
    "mentor_name" => $resultMain['name'],
    "mentor_details" => $resultMain['designation'],
    "mentor_image_url" => $resultMain['image'],

    "courses"=>$batcharr

); 
        // reset($courseDetails);

}

}else{
    $resp=500;
}



$msg = array("status" => true,"response"=>$resp,"message"=>"Course master categories", "course_groups" => $group);  

header('Content-Type: application/json');
print json_encode($msg);

?>


