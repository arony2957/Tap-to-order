<?php include('config/constants.php'); ?>

<html>
<head>
    <title>Register - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<div class="login">
    <h1 class="text-center">Registration</h1>
    <br><br>

    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    <br><br>

    <!-- Login Form Starts HEre -->
    <form action="" method="POST" class="text-center">
        Fullname: <br>
        <input type="text" name="fullname" placeholder="Enter Your name"><br><br>

        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>

        Password: <br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>

        <input type="submit" name="submit" value="Register" class="btn-primary">
        <br><br>
    </form>
    <!-- Login Form Ends HEre -->

    <p class="text-center">Created By - <a>Ryan Sultana Arony</a></p>
</div>

</body>
</html>

<?php

//CHeck whether the Submit Button is Clicked or NOt
if(isset($_POST['submit']))
{
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);


    $sql = "INSERT INTO tbl_user SET 
        full_name = '$fullname',
        username = '$username',
        password = '$password'
        ";
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['order'] = "<div class='success'>Registered Successfully.</div>";
        header('location:'.SITEURL.'index.php');
    }
    else
    {
        $_SESSION['order'] = "<div class='error'>Failed to Register.</div>";
        header('location:'.SITEURL.'registration.php');
    }


}

?>
