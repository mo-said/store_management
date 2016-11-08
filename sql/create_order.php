<?php
  	session_start();

include("config.php");
mysql_select_db('store_management');

$check_order = $_POST["order_number"];

$sql_check_number = "SELECT * FROM orders WHERE order_number = $check_order";

$rel_number = mysql_query($sql_check_number, $conn) or die(mysql_error());
if (mysql_num_rows($rel_number) > 0) {
	header("location: /store_management/index.php?error=1");
}else {
	
	$order_number = $_POST["order_number"];
	$details =$_POST["details"];
	$total_price = $_POST["total_price"];
	$date= $_POST["date"];

	$sql = " INSERT INTO orders ( order_number , details , total_price , date ) VALUES ('$order_number', '$details', '$total_price' , '$date' ) ";
	$rel=mysql_query($sql ,$conn);
	if (!$rel) {
		echo "not done";
	}else{

		echo "Done Insert";
	}

}

mysql_close($conn);
?>
