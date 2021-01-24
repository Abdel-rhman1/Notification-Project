<?php
    include "database.php";
    include "session.php";
    include "layout/validte.php";
    include "layout/person.php";
    include "layout/date.php";
class apimanpulation{
    public $arr=array();
    public $res;
    public $object;
    public function __construct(){
        $this->object = new datemanpuliation();
    }
    public function api(){
        $this->res = file_get_contents('http://api.aladhan.com/v1/calendarByCity?city=cairo&country=Eygpt&method=2&month=01&year=2021');
        $this->res = json_decode($this->res,true);
    }
    public function getarray(){
        $this->api();
        $dat = $this->object->getdate();
        for($i=0;$i<count($this->res['data']);$i++){
            if($this->res['data'][$i]['date']['gregorian']['date'] == $dat){
                echo "Good";
                $this->arr = $this->res['data'][$i]['timings'];
                break;
            }
        }
    }
    public function print2day(){
        $this->getarray();
        //$testobject = new sendmail();
        //$testobject->send();
        
        //print_r($this->arr);
    }     
}
if(isset($_POST['sendlogin'])){
   
    $email='';
    $password='';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $object = new inputvalidates('','',$password,$email,'');
    $object->validlogin();
}
if(isset($_POST['submit'])){
    echo  ("Hello World");
    if(isset($_POST['sendlogin'])){
        $object = new inputvalidates();
        $email='';
        $password='';
        $email = $_POST['email'];
        $password = $_POST['password'];
        validlogin($email,$password);
    }else if($_POST['submit']){
        $fname='';
        $lname='' ; $email='' ; $password='' ; $phone='' ; $color='' ; $brithday='';
        $arr ;
        if(isset($_POST['fname'])){
            $fname = $_POST['fname'];
        }
        if(isset($_POST['lname'])){
            $lname = $_POST['lname'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        $object = new inputvalidates($fname,$lname,$password,$email,$phone);
        $object->validation();
        $object->display();
    }
}
?>
    <?php
        require_once('layout/header.php');
    ?>
    <h1 class='fhead'>MemeberYou</h1>
    <p class='generaldesc'>For Remembering Important things like Praies and meeting</p>
    <div class='outerbox'>
    <div class='sigand'>
        <div class='row'>
            <div class='signupt col-sm-6 col-xs-6'>Sign Up</div>
            <div class='logint active col-sm-6 col-xs-6'>Log In</div>
        </div>
    </div>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST"
            enctype="multipart/form-data" class="sigin">
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12 col-xs-12'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class=" fa fa-users"></i>   
                        </span>
                        <input type="text" placeholder="Enter Your First Name" name="fname" id="fname" autocomplete="off" class='form-control' required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12 col-xs-12'>
                    <div class="input-group">
                        <span class="input-group-addon">
                           <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </span>
                        <input type="text" placeholder="Enter Your second Name" name="lname" id="lname"
                        autocomplete="off" class='form-control' required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12 col-xs-12'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password"
                        autocomplete="off" class='form-control' required>
                    </div>
                     <i class="fa fa-eye-slash" aria-hidden="true" id="show"></i>
                </div>
                
            </div>
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12 col-xs-12'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <input type="email" placeholder="Enter Your Email" name="email" id="email"
                        autocomplete="off"class='form-control ' required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12 col-xs-12'>
                    <div class="input-group">
                        <span class='input-group-addon'>
                            <i class="fa fa-phone-square" aria-hidden="true"></i>
                        </span>
                        <input type="phone" placeholder="Enter Your phone Number" name="phone" id="phone"
                        autocomplete="off" class='form-control' required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12  text-center col-xs-12'>
                    <input type="submit" value="create an account" name="submit" class='btn btn-lg btn btn-success col-sm-5 col-sm-offset-7 col-xs-7 col-xs-offset-5'>
                </div>
            </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" 
              class="login">
            <div class='row'>
                <div class='form-group form-group-lg col-sm-12'>
                    <div class="input-group">
                        <span class='input-group-addon'>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <input type="email" id="loginemail" name="email" placeholder="Enter your email address"
                         autocomplete="off" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group form-group-lg col-sm-12">
                    <div class='input-group'>
                        <span class='input-group-addon'>
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                        <input type="password" placeholder="type your password" id="loginpassword"
                               name="password" required autocomplete="off" class="form-control">
                    </div>
                    <i class="fa fa-eye-slash" aria-hidden="true" id="show2"></i>
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group-lg col-sm-12 text-center">
                    <input type="submit" value="Log In" id="sendlogin" name="sendlogin" class="btn btn-success btn btn-lg col-sm-5 col-sm-offset-7">
                </div>
            </div>
            <div class="row">
                <div class="form-group form-group-lg col-sm-12">
                    <div class=' pull-left'>
                        <input type="checkbox" id="chechbox" name="checkbox">
                        <span class="memberyou">Remember You (cookie)</span>
                    </div>
                    <div class=" pull-right">
                        <a href="#">
                            <p>Forget your Password?</p>
                        </a>
                    </div>
                </div>
            </div>
        </form>
            <div class='row'>
                <div class='form-group form-group-lg  col-sm-12 col-xs-12'>
                    <hr class="customhr col-sm-3 col-xs-2">
                    <span class='col-sm-4 connectingwith col-xs-5'>or connect with</span>
                    <hr class="customhr col-sm-3 col-xs-2">
                </div>
            </div>
         <div class="row social">
                <div class="form-group form-group-lg col-sm-12">
                    <div class="col-sm-3 col-xs-6">
                        <a href='#'> <img src="images/social/facebook.svg"> </a>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#"> 
                            <img src="images/social/google.svg"> 
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img src="images/social/linkedin.svg">
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <a href="#">
                            <img src="images/social/github.svg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 text-center">
                <p>
                    By signing up you agree to our
                    <a hef="#">
                        Terms of Service and Privacy Policy
                    </a>
                </p>
            </div>
        </div>
    <?php 
        require_once("layout/footer.php");
    ?>