<?php
include_once('../db/config.php');
$id=$_GET["id"];
$sql="update bed_allotment set release_date=sysdate() where id=".$id;
mysqli_query($con,$sql);
header("location:bedallotmentlist.php");
?>