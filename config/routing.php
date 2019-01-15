<?php 
$requestMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$GLOBALS['routings'] = [];
//including user module
include_once $_SERVER['DOCUMENT_ROOT'].'/module/user/config/routing.php';


//handle routings
$routed = false;
foreach($GLOBALS['routings'][$requestMethod] as $routing){
    if(preg_match($routing[0], $uri)) {
        $routed = true;
        $routingHandlers = explode(":", $routing[1]);
        include_once $_SERVER['DOCUMENT_ROOT'].$routingHandlers[2].$routingHandlers[0].".php";
        $handler = new $routingHandlers[0];
        $handler->$routingHandlers[1]();
    }
    
}
if(!$routed) {
    die("unknown request");
}
