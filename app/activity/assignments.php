<?php
include_once('./common.php');
$con = open_con();

// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);


$studentId = $data['studentId'] ?? '';
$apiToken = $data['apiToken'] ?? '';

$s_id=extract_cell('id','student_id',$studentId,'students');

if (empty($studentId) || empty($apiToken)  ) {

	$msg = array("status" => false,"response"=>400,"message"=>"Please provide valid parameters!");  

}
else{



    $assignments_student= extractRecord('*','student_id',$s_id,'continuous_evaluation_student'," AND type='1'");

    if(!is_array($assignments_student))
    {
        $assignments_data = array();

    }else{


    	$assignments_data=array();

        foreach ($assignments_student as $key => $value) {

        	$assignments_detail= extractRecord('*','id',$value['id'],'assignments'," ");


        	$batch_name = extract_cell('batch_name', 'id', $assignments_detail[0]['batch_id'], 'batch') == "NO-DATA" ? "" : extract_cell('batch_name', 'id', $assignments_detail[0]['batch_id'], 'batch');
        	$subject_name = extract_cell('subject_name','id',$assignments_detail[0]['subject_id'],'subjects') == "NO-DATA" ? "" : extract_cell('subject_name','id',$assignments_detail[0]['subject_id'],'subjects');

        	$end_date = new DateTime($assignments_detail[0]["end_date"]);
        	$end_date = $end_date->format('Y-m-d H:i:s ');

            $assignments_data[]=array(
                "assignmentId" => $assignments_detail[0]['id'],
                "assignmentName" => $assignments_detail[0]['assignment_name'],
                "batchName" => $batch_name,
                "subjectName" => $subject_name,
                "endDate" => timeToGo($end_date) ?? "0",
                "link" => $assignments_detail[0]['link']
            );
             


        }
    }


    
    $msg = array("status" => true,"response"=>200,"message"=>"Assignment Data", "assignment" => $assignments_data);  
}

header('Content-Type: application/json');
print json_encode($msg);



?>


