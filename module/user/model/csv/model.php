<?php 

class userModel {
    
    public $data ;
    
    public function __construct(){
        $moduleName = dirname(__FILE__);
        $dataFile = $moduleName."/testtakers.csv";
        $this->data = $dataFile;

    }
    
    public function getUsers($limit,$offset) {
        $file = fopen($this->data, "r") or exit("Unable to open file!");
        $handled = false;
        $firstLine = true;
        $result = [];
        while(!feof($file))
        {
            if($firstLine) {
                $firstLine = false;
                fgets($file);
                continue;
            }
            if(!$handled) {
            if($offset){
                $offset--;
                fgets($file);
                continue;
            }
            if(!$limit){
                
                $result[] =  fgets($file);
            }
            else {
                while($limit) {
                    $result[] =  fgets($file);
                    $limit--;
                    if(!$limit)$handled = true;
                }
            }
        }
        else {
            break;
        }
        }
        fclose($file);
        return $result;
     }
     public function getUser($id) {
         $file = fopen($this->data, "r") or exit("Unable to open file!");
         $result = [];
         while(!feof($file))
         {
             
             $line = fgets($file);
             $userData = explode(",",$line);
             if($userData[0] == $id) {
                 $result[] =  $line;
             }
         }
         
         fclose($file);
         return $result;
         
     }
}