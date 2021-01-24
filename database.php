<?php
interface database{
    public function openconnection($dataBaseName);
    public function insertintothedatabase($tableName);
    public function deletefromthedtabase();
    public function updatethedatabase();
    public function retuendatafromdatabase();
}
class mysqldatabase implements database{
    public $conn;
    public function openconnection($dataBaseName){
        try{
            $this->conn = mysqli_connect("localhost:3307","root","",$dataBaseName);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function check($email,$password):bool{
        $this->openconnection('remember');
        $stat = "select id from user where email= '$email' and  password = '$password'";
        $excute = mysqli_query($this->conn,$stat);
        if(mysqli_num_rows($excute) > 0){

            echo "Hello World";
            return true;
        }else{
            echo "bad World";
            return false;
        }
    }
    public function insertintothedatabase($tableName){
        try{
            $args = func_get_args();
            echo $tableName ."<br/>";
            $stat = "insert into $tableName(fname,lanme,email,password,phone) values(
                '$args[1]' , '$args[2]' , '$args[3]' , '$args[4]' , '$args[5]'
            )";
            $excute = mysqli_query($this->conn , $stat);
            if($excute){
                return true;
            }else{
                return false;
            }
            for($i=0;$i<sizeof($args);$i++){
                echo $args[$i];
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function deletefromthedtabase(){
        try{
             echo "Hello Mysql DataBase deletion";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function updatethedatabase(){
        try{
             echo "Hello Mysql DataBase updating";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function retuendatafromdatabase(){
        try{
             echo "Hello Mysql DataBase selectiog";
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
}
?>