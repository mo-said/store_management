<?php
include("./sql/config.php");
mysql_select_db('store_management');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Order</title>
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
 <div class="container">
  <div class="headline">
   <h2><b>Update Order</b></h2>
  </div>
  <br/>
 <form  method="post" action="./sql/edit_order.php">
 <?php
  $id=$_GET['id'];
  $sql="SELECT * FROM orders WHERE id='$id' ";
if($rel=mysql_query($sql,$conn)){
        if($res=mysql_fetch_array($rel)){
 ?>

     <input  type="hidden"  name="id" value=<?php echo $_GET['id']; ?> >

  <div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Order Number</label>
  <div class="col-xs-10">
    <span> <?php echo $res['order_number']; ?> </span>
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label" placeholder="description your order">Details</label>
  <div class="col-xs-10">
  	<textarea class="form-control" name="details" rows="2" placeholder="Details For order "><?php echo $res['details']; ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Total Price</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="total_price" placeholder="Enter Your Total Price" value=<?php echo $res['total_price']; ?> required>
  </div>
</div>

<div class="form-group row">
  <label for="example-date-input" class="col-xs-2 col-form-label">Date</label>
  <div class="col-xs-10">
    <input class="form-control" name="date" type="date" id="example-date-input" value=<?php echo $res['date']; ?> required>
  </div>
</div>
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success" >edit</button>
  </div>
  <?php
    }
  }
  ?>
  </form>

  </div>
</body>
</html>
<?php
mysql_close($conn);
?>