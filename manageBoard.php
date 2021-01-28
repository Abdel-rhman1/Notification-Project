<?php 
	require_once "database.php";
	require_once "session.php";
	$object = new mysqldatabase();
	if(isset($_GET['action'])&&$_GET['action']=='add'){
		$object->insertintoBoard($_GET['name'],$_GET['board']);
	}else if(isset($_GET['action'])&&$_GET['action']=='delete'){
		echo "Welcome in Delete method";
	}else if(isset($_GET['action']) && $_GET['action']=='addboard'){
		$object->insertnewBoard($_GET['name']);
	}else if(isset($_GET['action']) && $_GET['action']=='Moving'){
		echo "Right Position";
		$object->moveToAnotherList($_GET['target'],$_GET['card']);

	}
?>