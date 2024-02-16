<?php
include_once __DIR__.'/../lp/bpcore/AltoRouter.php';
include_once __DIR__.'/../lp/bpcore/config.php';

### JWT token system ###
include_once __DIR__.'/jwt/JWT.php';
include_once __DIR__.'/jwt/BeforeValidException.php';
include_once __DIR__.'/jwt/ExpiredException.php';
## Decode JWT Token
include_once __DIR__.'/jwt-functions/jwt-zoom-encode.php';

$router = new AltoRouter();
$router->setBasePath(APP_ROUTER_SUB_URL);



 include_once __DIR__.'/router_rule.php';




  $match = $router->match();
  if( $match && is_callable( $match['target'] ) ) {
  	call_user_func_array( $match['target'], $match['params'] ); 
  } else {
  	header('location:'.SITE_URL);
  }

 
?>
