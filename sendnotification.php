<?php
include 'index.php';
class sendmai{
    public $object;
    public $datobject;
    public $arr;
    public $currenttime;
    public function __construct(){
        $this->object = new apimanpulation();
        $this->datobject = new datemanpuliation();
        $this->object->getarray();
        $this->arr = $this->object->arr;
        $this->currenttime = $this->datobject->gettime();
    }
    public function sed(){
        
       foreach($this->arr as $key => $value){
           if($this->currenttime > $value){
               file_put_contents('logs.txt',$key . "Is Time Out\n",FILE_APPEND);
               
           }else{
               file_put_contents('logs.txt',$key . "Good Is Not Time Out\n",FILE_APPEND);
           }
       }
        file_put_contents('logs.txt',"________________________________________________",FILE_APPEND);
    }
}
$object = new sendmai();
$object->sed();
?>