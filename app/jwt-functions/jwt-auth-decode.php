<?php

use \Firebase\JWT\JWT;

function decodeJwt($jwt,$key){

  $decoded = JWT::decode($jwt, $key, array('HS256'));
    try {
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        // $decoded_array = (array) $decoded;
        return($decoded);
        // print_r($decoded);
    }catch(Exception $e) {
      return(0);
    }
  
}




?>

 