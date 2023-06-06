<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/Logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <?php  if(!isset($_SESSION['front_user'])) //IF user session is not set
                        {  ?>
                    <li>
                        <a href="<?php echo SITEURL; ?>login.php">log in</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>registration.php">Registration</a>
                    </li>
                    <?php } else {?>
                        <li>
                            <a href="<?php echo SITEURL; ?>logout.php">logout</a>
                        </li>
                        <li>
                            <a href="<?php echo SITEURL; ?>order_details.php">Order Details</a>
                        </li>
                    <?php }?>

<!--                    <li>-->
<!--                        <a href="--><?php //echo SITEURL; ?><!--payment.php">Payment</a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->