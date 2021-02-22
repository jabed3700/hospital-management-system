<?php
require_once('../db/query.php');
$cont = $_GET['id'];
$sql="INSERT INTO print_check (contact,paid) values ('$cont',1)";
mysqli_query($con,$sql);


$sql2="UPDATE payment set paid=1 where phone='$cont'";
mysqli_query($con,$sql2);

header('location: payment.php');








?>