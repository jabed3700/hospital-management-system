<?php
$id=$_GET["id"];
$pharmacist=$_GET["pharmacist"];
include_once("../db/query.php");
dataDelete("pharmacist_duty",$id);
header("location:pharmacistschedule.php?id=".$pharmacist);
?>