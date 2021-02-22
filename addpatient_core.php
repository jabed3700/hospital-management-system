<?php
require_once('db/query.php');

if(isset($_REQUEST['btn_sub'])){
	
	dataInsert('patient',array($_REQUEST['name'],$_REQUEST['department'],$_REQUEST['doctor'],$_REQUEST['details'],$_REQUEST['contact'],$_REQUEST['gname'],$_REQUEST['gcontact'],0));
	//return
	header('location: index.php');
}

?>