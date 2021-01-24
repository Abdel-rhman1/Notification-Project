<?php 
    class inputvalidates{
        public string $firstname;
        public string $lastname;
        public string $password;
        public string $email;
        public string $phone;
        public $arr;
        public function __construct(string $fname,string $lname,string $password,string $email,string $phon){
            $this->firstname = $fname;
            $this->lastname  = $lname;
            $this->password  = $password;
            $this->email     = $email;
            $this->phone     = $phon;
            $this->arr = array();
        }
        public function validation(){           
            $this->firstname = htmlspecialchars (filter_var($this->firstname,FILTER_SANITIZE_STRING));
            $this->lastname  = htmlspecialchars (filter_var($this->lastname,FILTER_SANITIZE_STRING));
            $this->password  = htmlspecialchars (filter_var($this->password,FILTER_SANITIZE_STRING));
            $this->email     = htmlspecialchars (filter_var($this->email,FILTER_SANITIZE_EMAIL));
            $this->phone     = htmlspecialchars (filter_var($this->phone, FILTER_SANITIZE_STRING));
            if(empty($this->firstname)){
                array_push($this->arr,"The First Name is must be greater than one characters");
            }
            if(empty($this->lastname)){
                array_push($this->arr,"The last is must be greater than one characters");
            }
            if(empty($this->password) || strlen($this->password) < 8){
                array_push($this->arr,"Password must be greater than 8 characters");
            }
            if(empty($this->email)){
                array_push($this->arr,"Email Must be greater than ");
            }
            if(empty($this->phone) || strlen($this->phone)<11){
                array_push($this->arr,"Phone Must be greater than 11 characters");
            }
        }
        public function validlogin(){
            if(empty($this->password) || strlen($this->password) < 8){
                array_push($this->arr,"Password must be greater than 8 characters");
            }
            if(empty($this->email)){
                array_push($this->arr,"Email Must be greater than ");
            }
            $object = new mysqldatabase();
            $ret = $object->check($this->email,sha1($this->password));
            if($ret){
                $object = new dealingsession();
                $retu = $object->startsession('id' ,$this->email);
                header('Location: index.php');
                exit();
            }else{
                echo "We are not user in our website";
            }
        }
        public function display(){
            if(sizeof($this->arr)==0){
                $object = new mysqldatabase();
                $object->openconnection('remember');
                $stat=$object->insertintothedatabase('user',$this->firstname,$this->lastname,$this->email,sha1($this->password),$this->phone);
                if($stat==true){
                    $object = new dealingsession();
                    $retu = $object->startsession('id' ,$this->email);
                    header('Location: index.php');
                    exit();
                }
            }else{
                echo "<div>";
                for($i=0;$i<sizeof($this->arr);$i++){
                    echo "<span class='alert alert-danger'>";echo $this->arr[$i];"</span>";
                }
                echo "</div>";
            }
        }
    }

?>