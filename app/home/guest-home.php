<?php
include_once('./common.php');
$con = open_con();

$sections[] = array(
    "section_name"=>'title',
    "welcomeTitle"=>"Hello Welcome"
);


// Homepage sliders 
$slider[] = array(
    "id" => 1,
    "url"=>ROUTER_URL."/dev/public/guesthomeslider.png"
); 

$slider[] = array(
    "id" => 1,
    "url"=>ROUTER_URL."/dev/public/guesthomeslider.png"
); 

$sections[] = array(
    "section_name"=>'sliders',
    "sliders"=>$slider
);



## course categories 

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

$sections[] = array(
    "section_name"=>'courses',
    "course_groups"=>$group
);



## demo videos 



$sqlshorts = mysqli_query($con,"select study_materials.* from study_materials where  is_available_for_demo=1  order by sort_order ASC limit 4 " );
    if($sqlshorts && mysqli_num_rows($sqlshorts)>0){
        while($data = mysqli_fetch_assoc($sqlshorts)){
            $videoList[]=array(
                "id"=>$data['id'],
                "thumbnail"=>$data['vimeo_thumbnail'],
                "title"=>$data['section_heading'],
                "duration"=>$data['duration_in_seconds']." mins",
                "video_url"=>$data['video_hls_url'],
            
            );

        }
    }


 
$sections[] = array(
    "section_name"=>'demo_videos',
    "videos"=>$videoList
);


#previousyear QN papers

$qnpapers[]=array(
    "id"=>1,
    "image"=>"https://phpstack-868684-3602485.cloudwaysapps.com/dev/public/qpaper.png",
    "title"=>"Solved Papers for Arc",
    "course_id"=>1
);
$qnpapers[]=array(
    "id"=>1,
    "image"=>"https://phpstack-868684-3602485.cloudwaysapps.com/dev/public/qpaper.png",
    "title"=>"Solved Papers for Design",
    "course_id"=>1
);
$qnpapers[]=array(
    "id"=>1,
    "image"=>"https://phpstack-868684-3602485.cloudwaysapps.com/dev/public/qpaper.png",
    "title"=>"Solved Papers for NIC",
    "course_id"=>1
);

$sections[] = array(
    "section_name"=>'study_materials',
    "qnpapers"=>$qnpapers
);

$msg = array("status" => true,"response"=>200,"message"=>"Guest home page data", "sections" => $sections);  


header('Content-Type: application/json');
print json_encode($msg);





?>


