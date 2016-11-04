<?php
include("./sql/config.php");
mysql_select_db('store_management');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Table Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
  .headline{
    text-align: center;
  }
  </style>
</head>
<body>
<div class='container'>
        <div class="headline">
  		<h2><b>Table Orders</b></h2>
        </div>
		<table class='table table-bordered'>
		<thead>
		<tr>
        <th>ID</th>
        <th>Ordar name</th>
        <th>details</th>
        <th>Total Price</th>
        <th>Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     <?php
      $sql="SELECT * FROM orders";
      
        if($rel=mysql_query($sql,$conn)){
        while($res=mysql_fetch_array($rel)){
     ?> 
        <tr>
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['order_number'] ?></td>
        <td><?php echo $res['details'] ?></td>
        <td><?php echo $res['total_price'] ?></td>
        <td><?php echo $res['date'] ?></td>
        <td><a  class="btn btn-danger" href=<?php echo "/Store_management/edit_order.php?id=".$res['id']?> >Edit</a></td>
      	</tr>
        <?php
      }
    }
  ?>  
    </tbody>
  </table>
<a  class="btn btn-success" href="index.php" >Create new order</a>
</div>
</body>
</html>
<?php
mysql_close($conn);
?>