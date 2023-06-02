<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>
    <div class="contact-info">
      <p><strong>Address:</strong> 123 Main Street, City, State, Zip Code</p>
      <p><strong>Phone:</strong> +1 123-456-7890</p>
      <p><strong>Email:</strong> info@example.com</p>
    </div>
    <h3>Send us a message</h3>
    <form action="process_contact.php" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <label for="message">Message</label>
      <textarea name="message" id="message" rows="5" required></textarea>

      <a href="<?php echo SITEURL; ?>index.php>" class="btn btn-primary">Submit</a>
    </form>
    
  </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Send email
  $to = "info@example.com"; // Enter your email address here
  $subject = "New Message from Food Order Contact Form";
  $body = "Name: $name\nEmail: $email\n\n$message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Message sent successfully. We will get back to you soon!";
  } else {
    echo "Oops! Something went wrong. Please try again later.";
  }
}
?>