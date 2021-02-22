<?php
require_once('../db/query.php');

if(isset($_REQUEST['btn_sub'])){
	dataInsert('medicine',array($_REQUEST['mname'],1,$_REQUEST['mprice']));
	header('location: addmedicine.php');
}

?>