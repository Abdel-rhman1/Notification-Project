<?php
    // include_once "session.php";
interface database{
    public function openconnection($dataBaseName);
    public function insertintothedatabase($tableName);
    public function deletefromthedtabase();
    public function updatethedatabase();
    public function retuendatafromdatabase();
    public function insertintoBoard($Name,$boardname);
    public function getdatafromBoard($listName);
    public function insertnewBoard($listName);
    public function selectanthor();
    public function selectAllLists();
    public function moveToAnotherList($TrgetListId , $CardToMove);
}
class mysqldatabase implements database{
    public $conn;
    public $sessionObject;
    public function openconnection($dataBaseName){
        //$this->sessionObject = new dealingsession();
        try{
            $this->conn = mysqli_connect("localhost:3307","root","",$dataBaseName);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getID($mail):int{
        $stat = "select ID from user where email='$mail'";
        $excute = mysqli_query($this->conn,$stat);
        $Res = mysqli_fetch_assoc($excute);
        return $Res['id'];
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
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getdatafromBoard($listName){
        $this->openconnection('remember');
        $stat = "select Name from card where boardName ='$listName'";
        $excute = mysqli_query($this->conn,$stat);
        return $excute;
    }
    public function insertintoBoard($name,$boardName){
        $this->openconnection('remember');
        $sessionid = 11;
        $stat = "insert into card(Name,Date,userID,boardName) values('$name'
        ,now(),'$sessionid','$boardName')";
        $excute = mysqli_query($this->conn,$stat);
        if($excute){
            
        }else{
            echo " error";
        }
    }
   public function insertnewBoard($listName){
        $this->openconnection('remember');
        $stat = "insert into board(Name,MemberID,Date,visiable) values('$listName',11,now(),0)";
        $excute = mysqli_query($this->conn,$stat);
        if($excute){
            echo "Good";
        }else{
            echo "Error";
        }
   }
   public function selectanthor(){
        $stat = "select * from board where ID > 3";
        $excute = mysqli_query($this->conn,$stat);
        return $excute;
   }
   public function selectAllLists(){
        $stat = "select * from board";
        $excute = mysqli_query($this->conn,$stat);
        return $excute;
   }
   public function moveToAnotherList($targetListId , $CardName){
        $this->openconnection('remember');
        $stat1 = "select Name from board where ID= '$targetListId'";
        $excute1 = mysqli_query($this->conn,$stat1);
        $res = mysqli_fetch_assoc($excute1);
        $Name = $res['Name'];
        echo $Name;
        $stat = "update card set boardName = '$Name' where Name='$CardName'";
        $excute = mysqli_query($this->conn,$stat);
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