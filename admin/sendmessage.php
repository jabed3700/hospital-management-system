<?php
include_once("../db/config.php");

$reciever=$_GET["reciever"];
$message=$_GET["message"];
$sql = "insert into admin_chat values(null,'admin','".$reciever."',2,'".$message."','',null,null)";
echo $sql;
mysqli_query($con,$sql);
?>