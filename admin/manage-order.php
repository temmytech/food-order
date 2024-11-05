<?php include ('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper1">
            <h1>Manage Order</h1>

            
            <?php if(isset($_SESSION['update'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['update'];
                        unset($_SESSION['update']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['update-failed'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['update-failed'];
                        unset($_SESSION['update-failed']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <br><br>
                        <!-- Button to Add Order -->
            <div class="button-style">
            <a href="#" class="btn-primary">Add Order</a>
            </div>
            <br><br>
            <div class="arrange">
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food Name</th>
                        <th>Food Price</th>
                        <th>Food Quantity</th>
                        <th>Total Price</th>
                        <th>Food Ordered Date</th>
                        <th>Food Status</th>
                        <th>Customer Name</th>
                        <th>Customer Contact</th>
                        <th>Customer Email</th>
                        <th>Customer address</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        //Create an SQL query to get all the food data from database
                        $order_data_query = "SELECT * FROM tbl_order ORDER BY id DESC ";
                        $order_data_result = mysqli_query($connection, $order_data_query);

                        //Count rows to check whether we have food or not
                        $count = mysqli_num_rows($order_data_result);
                        $sn = 1;

                        if($count > 0){
                            //we have food in database
                            //Get the food from database and display
                            while($row = mysqli_fetch_assoc($order_data_result)){
                                $id = $row['id'];
                                $Food_Name = $row['food'];
                                $Food_price = $row['price'];
                                $Food_qty = $row['qty'];
                                $Total_price = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $Customer_Name = $row['customer_name'];
                                $Customer_contact = $row['customer_contact'];
                                $Customer_email = $row['customer_email'];
                                $Customer_address = $row['customer_address'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $Food_Name; ?></td>
                                    <td>#<?php echo $Food_price; ?></td>
                                    <td><?php echo $Food_qty; ?></td>
                                    <td>#<?php echo $Total_price; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td>
                                        <?php
                                            if($status=="Ordered"){
                                                echo "<label>$status</label>";
                                            }elseif($status=="On Delivery"){
                                                echo "<label style='color: orange;'>$status</label>";
                                            }elseif($status=="Delivered"){
                                                echo "<label style='color: green;'>$status</label>";
                                            }elseif($status=="Cancelled"){
                                                echo "<label style='color: red;'>$status</label>";
                                            }
                                        ?>                                    
                                    </td>
                                    <td><?php echo $Customer_Name; ?></td>
                                    <td>0<?php echo $Customer_contact; ?></td>
                                    <td><?php echo $Customer_email; ?></td>
                                    <td><?php echo $Customer_address; ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/edit-order.php?id=<?= $row['id'] ?>" class="btn-secondary1 size2"><img src="<?= ROOT_URL ?>images/edit.png" alt=""></a>
                                        <!-- <a href="<?= ROOT_URL ?>admin/delete-order.php?id=<?= $row['id'] ?>" class="btn-danger size"><img src="<?= ROOT_URL ?>images/trash.png" alt=""></a> -->
                                    </td>
                                </tr>
                                <?php
                            }
                        }else
                        {
                            //Food not added into database
                            ?> 
                                <tr>
                                    <td colspan = "11"><div class="error">No Ordered Place.</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>