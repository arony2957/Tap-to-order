<?php include('partials-front/menu.php'); ?>
<?php include('partials-front/login-check.php'); ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the selected payment method
  $paymentMethod = $_POST["payment_method"];

  // Process the selected payment method
  switch ($paymentMethod) {
    case "bkash":
      // Process Bkash payment
      // Add your Bkash payment processing logic here
      echo "Bkash payment processing...";
      break;

    case "nagad":
      // Process Nagad payment
      // Add your Nagad payment processing logic here
      echo "Nagad payment processing...";
      break;

    case "card":
      // Process Card payment
      // Add your Card payment processing logic here
      echo "Card payment processing...";
      break;

    case "cod":
      // Process Pay on Delivery
      // Add your Pay on Delivery processing logic here
      echo "Pay on Delivery processing...";
      break;

    default:
      echo "Invalid payment method selected.";
      break;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Select Payment Method</h2>
    <form action="process_payment.php" method="post">
      <label for="bkash">Bkash</label>
      <input type="radio" name="payment_method" id="bkash" value="bkash">

      <label for="nagad">Nagad</label>
      <input type="radio" name="payment_method" id="nagad" value="nagad">

      <label for="card">Card</label>
      <input type="radio" name="payment_method" id="card" value="card">

      <label for="cod">Pay on Delivery</label>
      <input type="radio" name="payment_method" id="cod" value="cod">

      <input type="submit" value="Proceed to Payment">
    </form>
  </div>
</body>
</html>