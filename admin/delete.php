<?php
include_once("../db/query.php");
dataDelete($_GET["t"],$_GET["id"]);
header("location:".$_GET["r"]);
?>