<?php include('partials-front/menu.php'); ?>
<?php include('partials-front/login-check.php'); ?>

<div class="container">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>


        <?php

        //CHeck whether id is set or not
        if(isset($_GET['id']))
        {
            //GEt the Order Details
            $id=$_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM tbl_order WHERE id=$id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Detail Availble
                $row=mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_address= $row['customer_address'];
            }
            else
            {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location:'.SITEURL.'order_details.php');
            }
        }
        else
        {
            //REdirect to Manage ORder PAge
            header('location:'.SITEURL.'order_details.php');
        }

        ?>

        <form action="process_pages/update_process.php" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>

<?php include('partials-front/footer.php'); ?>
