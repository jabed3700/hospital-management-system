<?php
require_once('../db/query.php');



if(isset($_REQUEST['btn_sub'])){
	$profile = $_FILES['ppp']['name'];
	$tmp_name = $_FILES['ppp']['tmp_name'];
	$picid = uniqid();
	move_uploaded_file($tmp_name,"avater/$picid.jpg");

	dataInsert('nurse',array($_REQUEST['name'],$_REQUEST['contact'],1,$picid.".jpg",$_REQUEST['usrname'],$_REQUEST['password']));
	header('location: addnurse.php');
}



?>