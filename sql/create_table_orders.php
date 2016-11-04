<?php
include("config.php");

$sql="CREATE TABLE orders (
	  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  order_number INT NOT NULL UNIQUE,
  	  details VARCHAR(500) ,
      total_price FLOAT NOT NULL,
      date DATE NOT NULL	
      ); ";

mysql_select_db('store_management');
$rel=mysql_query($sql ,$conn);
if (!$rel) {
	echo "not done";
}else{
	
	echo "done ;)";
}

mysql_close($conn);

?>