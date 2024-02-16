<?php

use \Firebase\JWT\JWT;

function encodeJwt($studentRollId,$mobileNumber,$emailId,$stundetId,$countryCode,$accessToken){

    // create jwt
    $secret_key = 'KXOy-Q5c5-Yj5m-mE7b';
    $issuer_claim = "app.thinc.com"; // this can be the servername
    $audience_claim = "ThincStudents";
    $issuedat_claim = time(); // issued at
    $notbefore_claim = $issuedat_claim + 0; //not before in seconds
    $expire_claim = $issuedat_claim + 360000; // expire time in seconds

    $token = array(
        "iss" => $issuer_claim,
        "aud" => $audience_claim,
        "iat" => $issuedat_claim,
        "nbf" => $notbefore_claim,
        "exp" => $expire_claim,
        "data" => array(
            "studentId" => $studentRollId,
            "trans" => 'J8LpXSPJ8LpXSPyPkAxV7q3yPkAxV7q3',
            "mobileNumber" => $mobileNumber,
            "stundetId" => $stundetId,
            "emailId" => $emailId,
            "expiryTime"=>$expire_claim,
            "countryCode"=>$countryCode,
            "accessToken"=>$accessToken
            
    ));

    $jwt = JWT::encode($token, $secret_key);

    return($jwt);
}





?>

 