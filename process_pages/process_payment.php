<?php

include('../config/constants.php');
include('../partials-front/login-check.php');

if(isset($_POST['payment_submit']))
{
//    echo "<pre>";
//    print_r($_POST);

    // Get all the details from the form
    $front_user_id  = $_SESSION['front_user_id'];
    $last_order_id = $_SESSION['last_order_id'];
    $payment_method  = $_POST['payment_method'];
    $paid_amount  = $_POST['paid_amount'];
    $paymentDate = date('Y-m-d H:i:s', time());

    $sql = "INSERT INTO tbl_payment SET 
        user_id = $front_user_id,
        order_id = $last_order_id,
        payment_method = '$payment_method',
        paid_amount = $paid_amount,
        payment_date = '$paymentDate'
    ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql);

    //Check whether query executed successfully or not
    if($res2==true)
    {
        //Query Executed and Order Saved
        $_SESSION['payment_success'] = "<div class='success text-center'> Thank for your Payment. Your order is confirmed.</div>";
        header('location:'.SITEURL.'thankyou_msg.php');
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Failed to Pay For Food.</div>";
        header('location:'.SITEURL.'food.php');
    }


}


?>