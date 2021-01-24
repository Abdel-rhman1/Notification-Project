<?php 
    session_start();
    include "layout/header.php";
    include "layout/footer.php";
    include 'layout/navbar.php';
    if(!isset($_SESSION['id'])){
        header('Location: main.php');
    }else{ ?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 col-sm-6 col-xs-6'>
                <div class='todo'>
                    <div class='todohead'>
                        <div class='form-group col-sm-11'>
                            <input type="text" class="form-control todoinput" name="input2do" value="To Do" id="input2to">
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
                                <hr class='customizeline'>
                                <div class="moveall">Move all Cards in this List...</div>
                                <div class="archiveall">Archive all Cards in this List...</div>
                                <hr class='customizeline'>
                                <div class="Archivethis">Archive This List...</div>
                            </div>
                        </div>
                    </div>
                    <div class="todobody">
                        <span class="addnew pull-left">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add new Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-xs-6'>
                <div class='todo'>
                    <div class="todohead">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control doinginput"name="inputdoing"value="doing" id="doinginput">
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
                        <span class="addnew pull-left">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add new Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-xs-6'>
                    <div class='todo'>
                    <div class="todohead">
                        <div class="form-group col-sm-11">
                            <input type="text" class="form-control doinginput"name="inputdoing"value="doing" id="doinginput">
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
                        <span class="addnew pull-left">
                            &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                            Add new Card
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-3 col-sm-6 col-xs-6 defoult'>
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
                    <span class='terminal'>X</span>
                </div>
            </div>    
        </div>
    </div>
    <?php 
    }
?>