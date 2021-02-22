<?php
include_once("db/config.php");
$sender=$_POST["sender"];

$message=$_POST["message"];
$fname="";
if(isset($_FILES["file"])){
    $file=$_FILES["file"];

    $temp=$file["tmp_name"];
    $rand=rand();
    $ext=explode(".",$file["name"])[1];
    move_uploaded_file($temp,'adminfile/'.$rand.".".$ext);
    $fname=$rand.".".$ext;
}

$sql = "insert into admin_chat values(null,'".$sender."','admin',1,'".$message."','".$fname."',null,null)";
mysqli_query($con,$sql);
?>