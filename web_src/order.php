<?php
require "../data_src/includes/sessioncheck.php";
if(!checklogged()){
  header("location:index.php?LoggedIn=False");
}
?>


<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap');
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>WarehouseDelivery</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="header"> Warehouse Delivery </div>
  <form id="orderForm" action="../data_src/orders/create.php" method="post">
  <div class="flex-container">

    <div class="box">
      <select id="productSelect" name="selection1" onchange="setSelection1(this.value)">
        <option>Select Product</option>
      </select>
    </div>

    <div class="box">
      <select id="QuantitySelect" name="quantity" onchange="setQuantity(this.value)">
        <option>Select Amount</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>

    <div class="box2">
      <select id="locationSelect" name="selection2" onchange="setSelection2(this.value)">
        <option>Select Location</option>
      </select>
    </div>

  </div>
  </div>
  <div class="line"></div>
    <div class="modal">
      <div class="modal-content">
        <span class="modal-close-button">&times;</span>
        <!-- The message will be inserted here by JavaScript -->
      </div>
    </div>
  <div class="white-box">
    <div class="quantity"></div>
    <div class="selection1" ></div>
    <div class="selection2"></div>
    <div class="product">You want to send:</div>
    <div class="location"> To:</div>
    <button type="submit" id="confirmOrderButton" class="order">Confirm Order</button>
    </form>
  </div>
</body>
<script src="script.js"></script>

</html>

<?PHP
//echo shell_exec(escapeshellcmd('robot_main.py'));
?>