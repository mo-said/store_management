<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>create order</title>
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
   <h2><b>Create Order</b></h2>
  </div>
<br/>

 <form id="create_order" method="post" action="./sql/create_order.php">
  <div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Order Number</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" placeholder="Enter Your Order number" name="order_number" required >
  </div>
</div>
<?php if ( isset($_GET['error']) && $_GET['error'] == 1 )
{ 
?>
<div class="alert alert-danger">
  <strong><?php echo "your number is already exist"; ?></strong>
</div>
<?php
}
?>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label" placeholder="description your order">Details</label>
  <div class="col-xs-10">
  	<textarea class="form-control" name="details" rows="2" placeholder="Details For order"></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Total Price</label>
  <div class="col-xs-10">
    <input class="form-control" type="text" name="total_price" placeholder="Enter Your Total Price" required>
  </div>  
</div>
  <div class="price-error alert alert-danger" style="display:none;">
    Price should be number
  </div>

<div class="form-group row">
  <label for="example-date-input" class="col-xs-2 col-form-label">Date</label>
  <div class="col-xs-10">
    <input class="form-control" name="date" type="date" id="example-date-input" required>
  </div>
</div>
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success">Save</button>
  </div>
  <div class="alert alert-danger order-error" style="display:none;">
    Order Number, Price and Date are required
  </div>
  </form>
</div>
<script>
$(document).ready(function(){
$("#create_order").submit(function(event){
$(".order-error").hide();
$(".price-error").hide();  
var order_number= $("[name='order_number']").val();
var date= $("[name='date']").val();
var total_price= $("[name='total_price']").val();
if (order_number == "" || date =="" || total_price==""){
 $(".order-error").show();
 event.preventDefault(); 
}
if(isNaN(total_price)){
 $(".price-error").show(); 
 event.preventDefault(); 
}

});
});

</script>
</body>
</html>