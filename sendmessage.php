<?php
include_once("db/config.php");
$sender=$_GET["sender"];
$reciever=$_GET["reciever"];
$message=$_GET["message"];
$sql = "insert into messages values(null,'".$sender."','".$reciever."',1,'".$message."',null,null)";
mysqli_query($con,$sql);
?>