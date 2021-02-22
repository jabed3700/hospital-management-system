<?php
require_once('../db/query.php');



if(isset($_REQUEST['btn_sub'])){
	dataInsert('bed',array($_REQUEST['bed'],$_REQUEST['room'],$_REQUEST['nurse'],$_REQUEST['ac'],$_REQUEST['rent']));
	header('location: addbed.php');
}



?>