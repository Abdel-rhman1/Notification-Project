<?php
class dealingsession{
    public function __construct(){
        
    }
    public function startsession($key , $value) : bool{
        session_start();
        $_SESSION[$key] = $value;
        return true;
    }
    public function destorythesession(){
        
    }
    public function _destruct(){
        
    }
}
?>