<?php

include("config.php");
mysql_select_db('store_management');

$check_order = $_POST["order_number"];

$sql_check_number = "SELECT * FROM orders WHERE order_number = $check_order";

$rel_number = mysql_query($sql_check_number, $conn) or die(mysql_error());
$arr = "";
if (mysql_num_rows($rel_number) > 0) {
 $arr = array('status'=>'error');
	echo json_encode($arr);
}else{
	$arr = array('status'=>'success');
	echo json_encode($arr);	
}


?>