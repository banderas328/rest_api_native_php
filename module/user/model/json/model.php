<?php 

class userModel {
    
    public $data ;
    
    public function __construct(){
        $moduleName = dirname(__FILE__);
        $dataFile = $moduleName."/testtakers.json";
        $this->data = $dataFile;

    }
    public function getUsers($limit,$offset) {
        $data = file_get_contents($this->data);
        $data = json_decode($data);
        $result = [];
        $handled = false;
        foreach ($data as $user) {
            if(!$handled) {
            if($offset){
                $offset--;
                continue;
            }
            if(!$limit){
                $result[] =  $user;
            }
            else {
                    $result[] =  $user;
                    $limit--;
                    if(!$limit)$handled = true;
            }
        }
        else {
            break;
        }
        
        }
        return $result;
    }
    
    public function getUser($id) {
        $data = file_get_contents($this->data);
        $data = json_decode($data);
        $result = [];
        foreach ($data as $user) {
            if($user->login == $id) {
                $result[] =  $user;
            }
        }
        return $result;
    }
}