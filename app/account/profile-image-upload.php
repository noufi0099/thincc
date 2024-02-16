<?php
include_once('./common.php');
$con = open_con();

// $jsonData = file_get_contents('php://input');

// print_r($jsonData);

  
if(isset($_POST["studentId"])) {
    // Define the target directory to save uploaded images
    $target_dir = "../lp/imgserver/uploads/attachments";

    
    // Create the directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Get the uploaded file name
    $file_name = basename($_FILES["image"]["name"]);

    // Generate a unique name for the image to avoid overwriting
    $new_file_name = uniqid() . "_" . $file_name;
    $img_public_url = SITE_URL.$target_dir.$new_file_name;


    // Define the target path where the image will be saved
    $target_path = $target_dir . $new_file_name;

    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
        // Get other form data
        $apiToken = $_POST["apiToken"];
        $studentId = $_POST["studentId"];

            $query = mysqli_query($con,"
            UPDATE students  SET 
            profile_image_url='$img_public_url' 
            WHERE 
            student_id='$studentId' AND access_token='$apiToken'
            
        ");
        $msg = array("status" => true,"response"=>200,"message"=>"Student profile has been updated!","profile_image_url"=>$img_public_url);  

    } else {
        $msg = array("status" => false,"response"=>200,"message"=>"Error uploading the image file");  
    }
}else{
    $msg = array("status" => false,"response"=>200,"message"=>"Please provide valid parameters!");  
}


 
header('Content-Type: application/json');
print json_encode($msg);





?>


