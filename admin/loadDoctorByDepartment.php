<?php
include_once("../db/query.php");
$id=$_GET["id"];
printOptionsWithCondition("doctors","id","name"," dept_id=".$id);
?>