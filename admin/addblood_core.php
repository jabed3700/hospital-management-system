<?php
require_once('../db/query.php');



if(isset($_REQUEST['btn_sub'])){
	dataInsert('blood_bank',array($_REQUEST['group'],$_REQUEST['bag'],1,$_REQUEST['date'],5));
	header('location: addblood.php');
}











?>