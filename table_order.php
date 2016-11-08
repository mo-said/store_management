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
        <th>Date</th>
        <th>Details</th>
        <th></th>
  </tr>
    </thead>
    <tbody>
     <?php
      $sql="SELECT * FROM orders";
      $res = '';
        if($rel=mysql_query($sql,$conn)){
        while($res=mysql_fetch_array($rel)){

     ?> 
        <tr>
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['order_number'] ?></td>
        <td><?php echo $res['date'] ?></td>
        <td>
          

        
<table class='table table-bordered'>
    <thead>
    <tr>
        <th>item_name</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
     <?php
      $sql="SELECT * FROM line_items WHERE order_id=". $res['id'] .";";
      
        if($rel2=mysql_query($sql,$conn)){
        while($res2=mysql_fetch_array($rel2)){
     ?> 
        <tr>
        <td><?php echo $res2['item_name'] ?></td>
        <td><?php echo $res2['price'] ?></td>
     
        </tr>
        <?php
      }
    }
  ?>  
    </tbody>
  </table>


        </td>

        <td><a  class="btn btn-danger" href=<?php echo "/Store_management/edit_order.php?id=".$res['id']?> >Edit</a></td>
      	</tr>
        <?php
      }
    }
  ?>  
    </tbody>
  </table>
</div>
</body>
</html>
<?php
mysql_close($conn);
?>