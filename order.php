<!DOCTYPE html>
<html lang="en">
<head>
  <title>order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <style type="text/css">
  .headline{
    text-align: center;
  }
  </style>
</head>
<body>

<div class="container">
  <h2 class="headline">Enter New Order</h2>
  <form id="myForm" method="post" action="./sql/create_new_order.php">
    <div class="form-group">
      <label for="order_number">Order Number:</label>
      <input type="text" class="form-control " name="order_number" placeholder="Enter your order number" required>
    </div>
    <div class="order-error alert alert-danger" style="display:none;">
    the Order Number is Already exist
  </div>
    <div class="form-group">
      <label for="date">Order Date:</label>
      <input type="date" class="form-control" name="date" required>
    </div>
    <br>
    <hr/>
    <div class="item-error alert alert-danger" style="display:none;">
     at least 2 Items
  </div>
   <table id="#myTable" class='table table-bordered'>
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Price</th>
        <th><a id="addline" class="btn btn-success"href="#"  >Add line</a></th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td> <input class="item1" name="item[]" type="text" > </td>
        <td> <input class="price1" name="price[]" type="text" > </td>
      </tr>
      <tr>
        <td> <input class="item1" name="item[]" type="text" > </td>
        <td> <input class="price2" name="price[]" type="text" > </td>
        
      </tr>

    </tbody>
   </table>
      <a id="save" href="javascript:;" class="btn btn-warning col-md-offset-10">Save</a>

</form>

</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#save").click(function(event){
    $(".order-error").hide();
    $(".item-error").hide();
    var order_number= $("[name='order_number']").val();
    var item1= $(".item1").val();
    var item2= $(".item2").val();
    var price1= $(".price1").val();
    var price2= $(".price2").val();
    if (item1=="" || item2=="" || price1=="" || price2=="") {
        $(".item-error").show();
    }else{
      $.ajax ({
                type:"post",
                url:"/store_management/sql/check_order.php",
                data: {order_number: order_number},
                success:  function(response){
                    response = JSON.parse(response);
                    if(response["status"] == "success"){
                      $("#myForm").submit()
                    }else{
                      $(".order-error").show();  
                    }
                    }
            });
    }
    });
  });


$(document).ready(function(){
$("#addline").click(function () {
    $('table tr:last').after('<tr><td><input name="item[]" type="text" /></td><td><input name="price[]" type="text"/> <a style="float:right;" onclick="deleteRow(this);" class="btn" href="#" >X</a> </td></tr>');

});
});

function deleteRow(row)
{
    $(row).parents('tr').remove()
  }

</script>
</body>
</html>