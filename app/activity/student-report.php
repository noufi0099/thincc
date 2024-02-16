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



    $student_reports= extractRecord('*','student_id',$s_id,'continuous_evaluation_student'," AND type='1' AND report_status='1' ");

    if(!is_array($student_reports))
    {
        $report_data = array();

    }else{


    	$report_data=array();

        foreach ($student_reports as $key => $value) {

        	$report_detail= extractRecord('*','id',$value['id'],'assignments'," ");


        	$batch_name = extract_cell('batch_name', 'id', $report_detail[0]['batch_id'], 'batch') == "NO-DATA" ? "" : extract_cell('batch_name', 'id', $report_detail[0]['batch_id'], 'batch');
        	$subject_name = extract_cell('subject_name','id',$report_detail[0]['subject_id'],'subjects') == "NO-DATA" ? "" : extract_cell('subject_name','id',$report_detail[0]['subject_id'],'subjects');

        	$end_date = new DateTime($report_detail[0]["end_date"]);
        	$end_date = $end_date->format('Y-m-d H:i:s ');

            $report_data[]=array(
                "assignment_id" => $report_detail[0]['id'],
                "assignment_name" => $report_detail[0]['assignment_name'],
                "batch_name" => $batch_name,
                "subject_name" => $subject_name,
                "end_date" => timeToGo($end_date) ?? "0",
                "link" => $value['report_link']
            );
             


        }
    }


    
    $msg = array("status" => true,"response"=>200,"message"=>"Assignment Report Data", "report" => $report_data);  
}

header('Content-Type: application/json');
print json_encode($msg);



?>


