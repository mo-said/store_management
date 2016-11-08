<?php
include('config.php');
mysql_select_db('store_management');
// order part
$id=$_POST['id'];
$date= $_POST["date"];

$sql="UPDATE orders SET date='$date' where id='$id' ";
$rel=mysql_query($sql,$conn);

//delete items
$sql_delete = "DELETE FROM line_items WHERE order_id='$id' ";
$rel=mysql_query($sql_delete,$conn);
	

	//items part
	$items=$_POST["item"];
	$price=$_POST["price"];

	for ($i=0; $i<count($items); $i++) { 
		$sql_item = " INSERT INTO line_items ( item_name , price ,order_id ) VALUES ('$items[$i]', '$price[$i]' ,$id) ";
	    $rel=mysql_query($sql_item ,$conn);

	}
	header("location: /store_management/table_order.php");

mysql_close($conn);
?>