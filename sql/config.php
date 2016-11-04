<?php
   define('DB_HOST', '127.0.0.1:3306');
   define('DB_USER', 'root');
   define('DB_PASSWORD', '');
   $conn = mysql_connect(DB_HOST , DB_USER , DB_PASSWORD);
   if (!$conn) {
   	die("can't connect");
   }

?>