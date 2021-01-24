<?php
    class person{
    public string $first_name;
    public string $second_name;
    public string $password;
    public string $mail;
    public string $phone;
    public function __construct(){
        echo "Hello World";
    }
    public function setfirst_name(string $name):void{
        $this->first_name = $name;
    }
    public function getfirst_name():string{
        return $this->first_name;
    }
    }
    class user extends person{
        
    }
    class admin extends person{
        
    }

?>