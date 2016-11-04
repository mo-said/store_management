<?php
include("config.php");

$sql ="CREATE DATABASE store_management;";

$rel=mysql_query($sql ,$conn);
if (!$rel) {
	echo "not done";
}else{
	
	echo "done ;)";
}

mysql_close($conn);

?>
