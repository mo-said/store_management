<?php
include("config.php");
mysql_select_db('store_management');


	$order_number = $_POST["order_number"];
	$date= $_POST["date"];

	$sql_order = " INSERT INTO orders ( order_number , date ) VALUES ('$order_number', '$date' ) ";
	$rel=mysql_query($sql_order ,$conn);

	// items part
	$items=$_POST["item"];
	$price=$_POST["price"];
	$id="";
	$sql_id = "SELECT id FROM orders WHERE order_number = $order_number";
	if($rel=mysql_query($sql_id,$conn)){
	        if($res=mysql_fetch_array($rel)){
	        	$id=$res["id"];
	        	}
	        }
	for ($i=0; $i<count($items); $i++) { 
		$sql_item = " INSERT INTO line_items ( item_name , price ,order_id ) VALUES ('$items[$i]', '$price[$i]' ,$id) ";
	    $rel=mysql_query($sql_item ,$conn);

	}
	header("location: /store_management/table_order.php");

?>