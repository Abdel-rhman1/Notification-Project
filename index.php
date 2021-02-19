<?php 
    session_start();
    include "layout/header.php";
    require "layout/navbar.php"; 
    include 'database.php';
    $object = new mysqldatabase();
    if(!isset($_SESSION['id'])){
        header('Location: main.php');
    }else{ ?>
    <?php 
        
    ?>
    <!-- div class="theupper">
        <div class='row'>
            <div class='col-sm-1'>
                <i class="fa fa-database" aria-hidden="true"></i>
                <span>Boards</span>
            </div>
            <div class='col-sm-1'>
                Board Name
            </div>
            <div class="col-sm-1">
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <div class="col-sm-2">
                Useranme
                <span>free or Pri</span>
            </div>
            <div class="col-sm-1">
                <span>Private</span>
            </div>
            <div class="col-sm-2">
                users
            </div>
            <div class="col-sm-1">
                invite
            </div>
            <div class="col-sm-1">
                Calender
            </div>
            <div class="col-sm-1">
                Bultter
            </div>
            <div class="col-sm-1">
                Menu
            </div>
        </div>
    </div> -->
    <div class="row">
    <div class='container ' style="margin-top: 130px">
            <div class='col-md-3 col-sm-4 col-xs-8'>
                <div class='todo' draggable="true">
                    <div class='todohead'>
                        <div class='form-group col-sm-11'>
                            <input type="text" style="background-color: #ebecf0 !IMPORTANT ; border:none !IMPORTANT"
                             class="form-control todoinput" name="input2do" value="To Do" id="input2to">
                        </div>
                        <span class="pull-right choice">....</span>
                        <div class="option">
                            <div class='optionhead'>
                                <div class='row'>
                                    <p class='col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3'>list Actions</p>
                                    <span class='pull-right col-sm-2 col-xs-2 terminale'>x</span>
                                </div>
                            </div>
                            <hr class='customizeline'>
                            <div class='optionbody'>
                                <div class='add'>Add Card...</div>
                                <div class='Copy'>Copy List...</div>
                                <div class='Move'>Move List...</div>
                                <!-- <div class='moving'>
                                    <div class='movehead'>
                                        <span>Move </span>
                                    </div>
                                </div> -->
                                <hr class='customizeline'>
                                <div class="moveall">Move all Cards in this List...</div>
                                <div class="archiveall">Archive all Cards in this List...</div>
                                <hr class='customizeline'>
                                <div class="Archivethis">Archive This List...</div>
                            </div>
                        </div>
                    </div>
                    <div class="todobody">
                            <div class="gettingfromdataBase">
                                    <?php 
                                        //$data = array();    
                                         $data= $object->getdatafromBoard('To do');
                                        while($item = mysqli_fetch_assoc($data)){
                                        ?>
                                    <div class="withMovment"> 
                                    <div 
                                        class='form-group' 
                                        id='output'>
                                        <input 
                                            type='text' 
                                            class='form-control forstyling' 
                                            value="<?php echo $item['Name'];?>">
                                    </div>
                                    <span class='Movement'>Move To</span>
                                       <div class='showdirection'>
                                        <?php 
                                            $lists = $object->selectAllLists();
                                            while($list = mysqli_fetch_assoc($lists)){
                                                echo"<p class='btn btn-primary inputmove'>".$list['Name']."</p>";
                                                $id = $list['ID'];
                                                 echo "<input type='text' class='hiddeninput' hidden value=\"$id\">";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
                                </div>
                        <div class='thewholediv'>
                        <span class="addnew pull-left addingnewcard">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add a Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                        </div>

                        <div class='addingnewcardbody'> 
   
                                <div class='form-group'>
                                    <textarea class='form-control' placeholder="Enter a title for this card...." id=""></textarea>
                                    <div class='addingnewcardbutton'> 
                                        <input type="submit" class='btn btn-success btn btn-md sumbitthetitle' value="Add Card">               
                                        <span class='cradterminal' >X</span> 
                                        <span class='pull-right cardoption'>...</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            <div class='col-md-3 col-sm-4 col-xs-8'>
                <div class='todo'>
                    <div class="todohead">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control doinginput"name="inputdoing"value="doing">
                        </div>
                        <span class="pull-right choice">....</span>
                           <div class="option">
                            <div class='optionhead'>
                                <div class='row'>
                                    <p class='col-sm-6 col-sm-offset-3'>list Actions</p>
                                    <span class='pull-right col-sm-2 terminale'>x</span>
                                </div>
                            </div>
                            <hr class='customizeline'>
                            <div class='optionbody'>
                                <div class='add'>Add Card...</div>
                                <div class='Copy'>Copy List...</div>
                                <div class='Move'>Move List...</div>
                                <hr class='customizeline'>
                                <div class="moveall">Move all Cards in this List...</div>
                                <div class="archiveall">Archive all Cards in this List...</div>
                                <hr class='customizeline'>
                                <div class="Archivethis">Archive This List...</div>
                            </div>
                        </div>
                    </div>
                    <div class="todobody">
                        <div class="gettingfromdataBase">

                                    <?php 
                                        //$data = array();    
                                         $data= $object->getdatafromBoard('doing');
                                        while($item = mysqli_fetch_assoc($data)){
                                        ?>
                                <div class="withMovment">
                                    <div 
                                        class='form-group' 
                                        id='output'>
                                        <input 
                                            type='text' 
                                            class='form-control forstyling' 
                                            value="<?php echo $item['Name'];?>">
                                            <!-- <span class="movement">Move to</span> -->
                                    </div>
                                        <span class='Movement'>Move</span>
                                           <div class='showdirection'>

                                        <?php 
                                            $lists = $object->selectAllLists();
                                              while($list = mysqli_fetch_assoc($lists)){
                                                echo"<p class='btn  btn-primary inputmove'>".$list['Name']."</p>";
                                                    $id = $list['ID'];
                                                 echo "<input type='text' class='hiddeninput' hidden value=\"$id\">";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            
                        <div class='thewholediv'>
                        <span class="addnew pull-left addingnewcard">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add a Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class='addingnewcardbody'>
                                <div class='form-group'>
                                    <textarea class='form-control' placeholder="Enter title for this card" id="" value='Enter title for this card'></textarea>
                                    <div class='addingnewcardbutton'> 
                                        <input type="submit" class='btn btn-success btn btn-md sumbitthetitle' value="Add Card">               
                                        <span class='cradterminal' >X</span> 
                                        <span class='pull-right cardoption'>...</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-sm-4 col-xs-8'>
                    <div class='todo'>
                    <div class="todohead">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control doinginput"name="inputdoing"value="done">
                        </div>
                        <span class="pull-right choice">....</span>
                           <div class="option">
                            <div class='optionhead'>
                                <div class='row'>
                                    <p class='col-sm-6 col-sm-offset-3'>list Actions</p>
                                    <span class='pull-right col-sm-2 terminale'>x</span>
                                </div>
                            </div>
                            <hr class='customizeline'>
                            <div class='optionbody'>
                                <div class='add'>Add Card...</div>
                                <div class='Copy'>Copy List...</div>
                                <div class='Move'>Move List...</div>
                                <hr class='customizeline'>
                                <div class="moveall">Move all Cards in this List...</div>
                                <div class="archiveall">Archive all Cards in this List...</div>
                                <hr class='customizeline'>
                                <div class="Archivethis">Archive This List...</div>
                            </div>
                        </div>
                    </div>
                    <div class="todobody">
                                                        <div class="gettingfromdataBase">
                                    <?php 
                                        //$data = array();    
                                         $data= $object->getdatafromBoard('done');
                                        while($item = mysqli_fetch_assoc($data)){
                                        ?>
                                    <div 
                                        class='form-group' 
                                        id='output'>
                                        <input 
                                            type='text' 
                                            class='form-control forstyling stylingdata' 
                                            value="<?php echo $item['Name'];?>">
                                    </div>
                                    <span class='Movement'>Move</span>
                                       <div class='showdirection'>
                                        <?php 
                                            $lists = $object->selectAllLists();
                                              while($list = mysqli_fetch_assoc($lists)){
                                                echo"<p class='btn btn-primary inputmove'>".$list['Name']."</p>";
                                                $id = $list['ID'];
                                                 echo "<input type='text' class='hiddeninput' hidden value=\"$id\">";
                                            }
                                        ?>
                                    </div>
                                <?php }?>
                                </div>
                        <div class='thewholediv'>
                        <span class="addnew pull-left addingnewcard">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add a Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class='addingnewcardbody'>

                                <!-- <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="POST"> -->
                                <div class='form-group'>
                                    <textarea class='form-control' placeholder="Enter a title for this card" id=""></textarea>
                                    <div class='addingnewcardbutton'> 
                                        <input type="submit" class='btn btn-success btn btn-md sumbitthetitle' value="Add Card">      
                                        <span class='cradterminal' >X</span> 
                                        <span class='pull-right cardoption'>...</span>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $data = $object->selectanthor();
                while($item = mysqli_fetch_assoc($data)){ 
                        $Name = $item['Name'];
                    ?>
                        <div class='col-md-3 col-sm-4 col-xs-8'>
                    <div class='todo'>
                    <div class="todohead">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control doinginput"name="inputdoing"value="<?php echo $Name; ?>" class="doinginput">
                        </div>
                        <span class="pull-right choice">....</span>
                           <div class="option">
                            <div class='optionhead'>
                                <div class='row'>
                                    <p class='col-sm-6 col-sm-offset-3'>list Actions</p>
                                    <span class='pull-right col-sm-2 terminale'>x</span>
                                </div>
                            </div>
                            <hr class='customizeline'>
                            <div class='optionbody'>
                                <div class='add'>Add Card...</div>
                                <div class='Copy'>Copy List...</div>
                                <div class='Move'>Move List...</div>
                                <hr  class='customizeline'>
                                <div class="moveall">Move all Cards in this List...</div>
                                <div class="archiveall">Archive all Cards in this List...</div>
                                <hr class='customizeline'>
                                <div class="Archivethis">Archive This List...</div>
                            </div>
                        </div>
                    </div>
                    <div class="todobody">
                         <div class="gettingfromdataBase">
                                    <?php 
                                        //$data = array();    
                                         $data2 = $object->getdatafromBoard($Name);
                                        while($item2 = mysqli_fetch_assoc($data2)){
                                        ?>
                                    <div 
                                        class='form-group' 
                                        id='output'>
                                        <input 
                                            type='text' 
                                            class='form-control forstyling stylingdata' 
                                            value="<?php echo $item2['Name'];?>">
                                    </div>
                                    <span class='Movement'>Move</span>
                                       <div class='showdirection'>
                                        <?php 
                                            $lists = $object->selectAllLists();
                                              while($list = mysqli_fetch_assoc($lists)){
                                                echo"<p class='btn btn-primary inputmove'>".$list['Name']."</p>";
                                                $id = $list['ID'];
                                                 echo "<input type='text' class='hiddeninput' hidden value=\"$id\">";
                                            }
                                        ?>
                                    </div>
                                <?php }?>
                                </div>
                                

                        <div class='thewholediv'>
                        <span class="addnew pull-left addingnewcard">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add a Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class='addingnewcardbody'>                           
                                <div class='form-group'>
                                    <textarea class='form-control' placeholder="Enter a title for this card" id=""></textarea>
                                    <div class='addingnewcardbutton'> 
                                        <input type="submit" class='btn btn-success btn btn-md sumbitthetitle' value="Add Card">      
                                        <span class='cradterminal' >X</span> 
                                        <span class='pull-right cardoption'>...</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class='col-md-3 col-sm-4 col-xs-8'>
                <div class='new'>
                    <span>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </span>
                    <span>
                        Add anthor list
                    </span>
                </div>
                <div class='todo addingnewlist'>
                    <div class='form-group'>
                        <input class='form-control' type='text' name='newlist' id='newlist' placeholder="Enter List title...">
                    </div>
                    <input type='submit' class='btn btn-success btn btn-md' value='Add List' id="adding">
                    <span class='terminallist'>X</span>
                </div>
            </div>    
        </div>
    </div>
    <?php 
        include "layout/footer.php";
    }
?>
</html>