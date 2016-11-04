<?php
include('config.php');

$id=$_POST['id'];
$details =$_POST["details"];
$total_price = $_POST["total_price"];
$date= $_POST["date"];

$sql="UPDATE orders SET details='$details' , total_price='$total_price',date='$date' where id='$id'";

mysql_select_db('store_management');
$rel=mysql_query($sql,$conn);
if (!$rel) {
	echo "not done";
}else{
	header("location: /store_management/table_order.php");
}
mysql_close($conn);
?>