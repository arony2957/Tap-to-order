<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Order Details</h2>
                <div class="food-menu-box" style="width: 100%">

                        <div>
                            <table id="cus_table" class="tbl-full">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Food</th>
                                    <th>Price</th>
                                    <th>Qty.</th>
                                    <th>Total</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                                <?php
                                //Get all the orders from database
                                $sql = "SELECT * FROM tbl_order where user_id = ".$_SESSION['front_user_id']." ORDER BY id DESC"; // DIsplay the Latest Order at First
                                //Execute Query
                                $res = mysqli_query($conn, $sql);
                                //Count the Rows
                                $count = mysqli_num_rows($res);

                                $sn = 1; //Create a Serial Number and set its initail value as 1

                                if($count>0)
                                {
                                    //Order Available
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //Get all the order details
                                        $id = $row['id'];
                                        $food = $row['food'];
                                        $price = $row['price'];
                                        $qty = $row['qty'];
                                        $total = $row['total'];
                                        $order_date = $row['order_date'];
                                        $status = $row['status'];
                                        $customer_name = $row['customer_name'];
                                        $customer_contact = $row['customer_contact'];
                                        $customer_address = $row['customer_address'];

                                        ?>

                                        <tr>
                                            <td><?php echo $sn++; ?>. </td>
                                            <td><?php echo $food; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>

                                            <td>
                                                <?php
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                                ?>
                                            </td>

                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $customer_contact; ?></td>
                                            <td><?php echo $customer_address; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>user_update_order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                            </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                {
                                    //Order not Available
                                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                                }
                                ?>


                            </table>

                        </div>
                    </div>

            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>