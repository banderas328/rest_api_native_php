<?php 


class userController {
    public $model;
    
    public function __construct(){
        $params = include_once(dirname(__FILE__)."/config/moduleConfig.php");
        include_once(dirname(__FILE__)."/model/").$params['model']."/model.php";
        $this->model = new userModel();
    }
    
    public function getAllUsers(){
        $result = $this->model->getUsers($_REQUEST['limit'],$_REQUEST['offset']);
        $result = json_encode($result);
        echo $result;
    }
    
    public function getUser(){
        $result = $this->model->getUser($_REQUEST['id']);
        $result = json_encode($result);
        echo $result;
    }
}