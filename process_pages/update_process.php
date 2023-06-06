<?php include('../config/constants.php'); ?>
<?php include('../partials-front/login-check.php'); ?>

<?php
//CHeck whether Update Button is Clicked or Not
if(isset($_POST['submit']))
{
    //echo "Clicked";
    //Get All the Values from Form
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;

    $status = $_POST['status'];

    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_address = $_POST['customer_address'];

    //Update the Values
    $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_address = '$customer_address'
                    WHERE id=$id
                ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //CHeck whether update or not
    //And REdirect to Manage Order with Message
    if($res2==true)
    {
        //Updated
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        header('location:'.SITEURL.'order_details.php');
    }
    else
    {
        //Failed to Update
        $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
        header('location:'.SITEURL.'order_details.php');
    }
}
?>
