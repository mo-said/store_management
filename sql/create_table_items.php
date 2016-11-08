<?php
include("config.php");

$sql="CREATE TABLE line_items (
	  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  item_name varchar(255) NOT NULL,
  	  price FLOAT NOT NULL ,
      order_id int NOT NULL, 
      FOREIGN KEY (order_id) REFERENCES orders(id)
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