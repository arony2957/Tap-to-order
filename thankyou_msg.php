<?php include('partials-front/menu.php'); ?>
<?php include('partials-front/login-check.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white"><?=(isset($_SESSION['payment_success']))?$_SESSION['payment_success']:''?></h2>
        <?php unset($_SESSION['payment_success'])?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php include('partials-front/footer.php'); ?>