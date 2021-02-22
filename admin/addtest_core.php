<?php
require_once('../db/query.php');

if(isset($_REQUEST['btn_sub'])){
	dataInsert('tests',array($_REQUEST['tname'],$_REQUEST['tprice'],$_REQUEST['details']));
	header('location: addtest.php');
}

?>