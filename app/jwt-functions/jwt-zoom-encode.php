<?php

use \Firebase\JWT\JWT;

function encodeZoomJwt(){

    // create jwt
    // $secret_key = '3uMdwiP7CbwS6NlUmRZfN3HreIZ3h1iX';
    // $secret_key = '9apM9ZOxafDbamynkRMj070WYmtanQ6r';
    $secret_key = 'k7CD6DWB2uYHi8HMYoIqAN7SGszxyhKb';
    $issuer_claim = "zoom.us"; // this can be the servername
    $audience_claim = "ElanceStudents";
    $issuedat_claim = time(); // issued at
    $notbefore_claim = $issuedat_claim + 0; //not before in seconds
    $expire_claim = $issuedat_claim + 572800; // expire time in seconds
    
        // "appKey"=> "gMvwdyEFTz2aos667kL1gw",
        // "appKey"=> "qo4Vrl7XScapWoK3kf4hw",


    $payload = array(
        // "iss" => $issuer_claim,
        "mn" => '',
        "iat" => $issuedat_claim,
        "exp" => $expire_claim,
        "appKey"=> "y3e0WklaRUeveh32zCj3bw",
        "sdkKey"=> "y3e0WklaRUeveh32zCj3bw",
        "role"=> 0,
        "tokenExp"=> $expire_claim
   );

    $jwt = JWT::encode($payload, $secret_key);

    return($jwt); 

}





?>

