<html>
<?php include('partials-front/menu.php'); ?>
<?php include('partials-front/login-check.php'); ?>

<head>
  <title>Cart</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Cart</h2>
    <table class="cart-table">
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>Item 1</td>
        <td>$10</td>
        <td>2</td>
        <td>$20</td>
      </tr>
      <tr>
        <td>Item 2</td>
        <td>$15</td>
        <td>1</td>
        <td>$15</td>
      </tr>
    </table>
    <div class="cart-total">
      <p><strong>Total:</strong> $35</p>
    </div>
    <div class="checkout">
      <a href="checkout.php">Proceed to Checkout</a>
    </div>
  </div>
</body>
</html>