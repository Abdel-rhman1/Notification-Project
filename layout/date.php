<?php 
    class datemanpuliation{
    public string $date;
    public function __construct(){
           
    }
    public function settimezone():void{
        date_default_timezone_set("Africa/Cairo");
    }
    public function gettime():string{
        $this->settimezone();
        $d = strtotime("-10 Hours");
        return date('H:i',$d);
    }
    public function getdate():string{
        $this->settimezone();
        $d = strtotime("-10 Hours");
        return date('d-m-Y',$d);
    }
    public function getmonth():string{
        
    }
    public function getyear():string{
        
    }
}
?>