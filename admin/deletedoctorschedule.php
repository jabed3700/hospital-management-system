
<?php
$id=$_GET["id"];
$doctor=$_GET["doctor"];
include_once("../db/query.php");
dataDelete("doctors_schedule",$id);
header("location:doctorschedule.php?id=".$doctor);
?>