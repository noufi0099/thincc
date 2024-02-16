<?php
include_once('./common.php');
$con = open_con();


// Get the raw JSON data from the HTTP POST request
$jsonData = file_get_contents('php://input');
// Decode the JSON string into a PHP associative array
$data = json_decode($jsonData, true);

$apiToken = $data['apiToken'] ?? '';
$batchId = $data['courseId'] ?? ''; //batch_id
$studentId = $data['studentId'] ?? ''; // encrypted string
$payLater=$data['isPaylater'] ?? 0;
$access_code = uniqid();
$q1=$q2=$q3=false;

if (empty($batchId) || empty($apiToken) || empty($studentId)) {

    $msg = array("status" => false,"response"=>500,"message"=>"Please provide valid parameters!");  


}else{




    $s_id=extract_cell('id','student_id',$studentId,'students');
    $batch_details=extractRecord('*','id',$batchId,'batch');

    $batch_linked_courses=joinTables('batch_course.*,courses.*','batch_course','courses','LEFT','batch_course.course_id','courses.id'," WHERE (courses.status=1 and courses.app_status=1) and batch_course.batch_id='{$batchId}'  ");


    if( is_array($batch_linked_courses)){
        $expiry= new DateTime($batch_details[0]['batch_start_date'], new DateTimeZone('Asia/Kolkata'));
        $expiry=$expiry->modify("+{$batch_details[0]['batch_duration']} days")->format('Y-m-d');
        try {

            $Arr= array(
                'batch_id'=>$batchId,
                'student_id'=>$s_id,
                'expired_on'=> $expiry ,
                'payment_status'=> (($payLater)? 0 : 1),
                'is_demo_user'=> ((!$payLater)? 0 : 1)

            ); 

            $q1=sqlInsertQueryArraySet('batch_student',$Arr,0,1);
            if(!$payLater)
            {

                $Arr2= array(
                    'uuid'=>gen_uuid(),
                    'amount'=>$batch_details[0]["selling_price"],
                    'paymentModeId'=> 1 ,
                    'settlement'=> 1,
                    'referkey'=>"batch",
                    'referkeyid'=>$batchId,
                    'student_id'=>$s_id,
                    'balance_amt'=> 0

                ); 

                $q2=sqlInsertQueryArraySet('payment_log',$Arr2,0,1);
            }
        }

        catch(Exception $e) {
  // echo 'Message: ' ;
            $mError=$e->getMessage();
            if($e->getCode()=="1062"){
                $mError="ALREADYSUBSCRIBED";
            }

            $msg = array("status" => false,"response"=>500, "message" =>$mError); 




        }
        try{

            foreach ($batch_linked_courses[1] as $key => $value) {
                $subjects=extractRecord('id','course_id',$value["course_id"],'subjects');
                if(is_array($subjects)){

                   foreach ($subjects as $key => $value) {



                      $Arr= array(
                        'batch_id'=>$batchId,
                        'student_id'=>$s_id,
                        'subject_id'=> $value["id"],
                        'access_expiry_date'=> $expiry 

                    ); 

                      $q3=sqlInsertQueryArraySet('batch_student_subjects',$Arr,0,1);

                  }
              }


          }

      }
      catch(Exception $e) {
  // echo 'Message: ' ;
        $mError=$e->getMessage();
        if($e->getCode()=="1062"){
            $mError="ALREADYSUBJECTADDED";
        }

        $msg = array("status" => false,"response"=>500, "message" =>$mError); 




    }


    if(($q1 && $q2) || $q3){
        $msg = array("status" => true,"response"=>200, "message" =>((!$payLater)? "Successfully Enrolled!" : "Successfully Enrolled! With PayLater"));  
    }else{
        $msg = array("status" => false,"response"=>500, "message" =>"Custome already enrolled. ".mysqli_error($con));  
    }

}else{
    $msg = array("status" => false,"response"=>400, "message" =>"Invalid Course id");  
}




}

header('Content-Type: application/json');
print json_encode(array("attributes" => $msg));





?>


