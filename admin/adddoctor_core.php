<?php
require_once('../db/query.php');



if(isset($_REQUEST['btn_sub'])){
	$profile = $_FILES['ppp']['name'];
	$tmp_name = $_FILES['ppp']['tmp_name'];
	$picid = uniqid();
	move_uploaded_file($tmp_name, "avater/$picid.jpg");

	dataInsert('doctors',array($_REQUEST['name'],$_REQUEST['designation'],$_REQUEST['department'],1,$_REQUEST['fees'],$_REQUEST['contact'],$picid.".jpg",$_REQUEST['usrname'],$_REQUEST['password']));
	header('location: adddoctor.php');
}











?>