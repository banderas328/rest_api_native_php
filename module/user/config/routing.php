<?php 
$GLOBALS['routings']["GET"][] = array("/user\/[a-zA-Z]{0,25}/", "userController:getUser:/module/user/");
$GLOBALS['routings']["GET"][] = array("/users/", "userController:getAllUsers:/module/user/");
