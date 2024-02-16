<?php


//auth function
### JWT token system ###
include_once('jwt/JWT.php');
include_once('jwt/BeforeValidException.php');
include_once('jwt/ExpiredException.php');
## Decode JWT Token
include_once('./jwt-functions/jwt-auth-encode.php');
include_once('./jwt-functions/jwt-auth-decode.php');
// include_once('./jwt-functions/validate-user-token.php');


## DB import

include_once('../lp/bpcore/config.php');
include_once('../lp/bpcore/sqltransaction.php');

function open_con(){
    $con = mysqli_connect(DBHOST,DBUSER,DBPASSWORD,DATABASE);
    mysqli_character_set_name($con);
	mysqli_set_charset($con, "utf8");

    if($con) {
        return $con;
    }else {
        echo "connection issues ".mysqli_error($con);
        exit;
    }
}

function close_con($con){
    if($con) {
        mysqli_close($con);
    }
}




?>


