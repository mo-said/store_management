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
 <form  method="post" action="./sql/update_order.php">
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
  <label for="example-date-input" class="col-xs-2 col-form-label">Date</label>
  <div class="col-xs-10">
    <input class="form-control" name="date" type="date" id="example-date-input" value=<?php echo $res['date']; ?> required>
  </div>
</div>
 <?php
    }
  }
  ?>
<br>
    <hr/>
   <table id="#myTable" class='table table-bordered'>
    <thead>

      <tr>
        <th>Item Name</th>
        <th>Price</th>
        <th><a id="addline" class="btn btn-success"href="#"  >Add line</a></th>
      </tr>
    </thead>
    <tbody>
     <?php
      $sql="SELECT * FROM line_items WHERE order_id=". $res['id'] .";";
      
        if($rel2=mysql_query($sql,$conn)){
        while($res2=mysql_fetch_array($rel2)){
     ?> 
    
      <tr>
        <td> <input name="item[]" type="text" value="<?php echo $res2['item_name']; ?>" > </td>
        <td> <input name="price[]" type="text" value=<?php echo $res2['price']; ?> ></td>
      </tr>
 <?php
    }
  }
  ?>
    </tbody>
   </table>
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-warning col-md-offset-10" >edit</button>
  </div>
 
  </form>

  </div>

<script type="text/javascript">
$(document).ready(function(){
$("#addline").click(function () {
    $('table tr:last').after('<tr><td><input name="item[]" type="text" /></td><td><input name="price[]" type="text"/> <a style="float:right;"  class="btn" onclick="deleteRow(this)" href="#">X</a> </td></tr>');

});
});

function deleteRow(row)
{
    $(row).parents('tr').remove();
}

</script>

</body>
</html>
<?php
mysql_close($conn);
?>