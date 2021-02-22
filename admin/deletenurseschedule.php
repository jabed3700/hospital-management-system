<?php
$id=$_GET["id"];
$nurse=$_GET["nurse"];
include_once("../db/query.php");
dataDelete("nurse_duty",$id);
header("location:nurseschedule.php?id=".$nurse);
?>