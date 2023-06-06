<?php include('../config/constants.php'); ?>
<?php include('../partials-front/login-check.php'); ?>

<?php 
//CHeck whether submit button is clicked or not
if(isset($_POST['submit']))
{
    // Get all the details from the form
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $food_id= $_POST['food_id'];
    $total = $price * $qty; // total = price x qty 

    $order_date = date("Y-m-d h:i:s"); //Order DAte

    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    $front_user_id = $_SESSION['front_user_id'];

    //Save the Order in Databaase
    //Create SQL to save the data
    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = $price,
        food_id = $food_id,
        qty = $qty,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address',
        user_id = $front_user_id
    ";

    //echo $sql2; die();

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Check whether query executed successfully or not
    if($res2==true)
    {
        //Query Executed and Order Saved
        $last_id = $conn->insert_id;
        $_SESSION['last_order_id'] = $last_id;

        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully. Please make the payment for confirm your order.</div>";
        header('location:'.SITEURL.'payment.php');
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
        header('location:'.SITEURL.'foods.php');
    }

}

?>