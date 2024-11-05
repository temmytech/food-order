<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <?php if(isset($_SESSION['login-success'])) : // shows if login was seccessfull?>
                    <div class="alert_message text-center success">
                        <p>
                            <?= $_SESSION['login-success'];
                            unset($_SESSION['login-success']);
                            ?>
                        </p>
                    </div>
            <?php endif ?>
            <h1>Dashbord</h1>
            <br><br><br>
            <div class="col-4 text-center">
                <?php
                //Create an SQL query to get all the food data from database
                    $category_data_query = "SELECT * FROM tbl_category ";
                    $category_data_result = mysqli_query($connection, $category_data_query);

                    //Count rows to check whether we have food or not
                    $count = mysqli_num_rows($category_data_result);
                ?>
                <h1 style="color: green; "><?php echo $count ?></h1><br>
                <h4>Categories</h4>
            </div>
            <div class="col-4 text-center">
                <?php
                    //Create an SQL query to get all the food data from database
                        $food_data_query_2 = "SELECT * FROM tbl_food ";
                        $food_data_result_2 = mysqli_query($connection, $food_data_query_2);

                        //Count rows to check whether we have food or not
                        $count_2 = mysqli_num_rows($food_data_result_2);
                ?>
                <h1 style="color: green; "><?php echo $count_2 ?></h1><br>
                <h4>Foods</h4>
            </div>
            <div class="col-4 text-center">
                <?php
                    //Create an SQL query to get all the food data from database
                        $order_data_query_2 = "SELECT * FROM tbl_order ";
                        $order_data_result_2 = mysqli_query($connection, $order_data_query_2);

                        //Count rows to check whether we have food or not
                        $count_3 = mysqli_num_rows($order_data_result_2);
                ?>
                <h1 style="color: green; "><?php echo $count_3 ?></h1><br>
                <h4>Total Orders </h4>
            </div>
            <div class="col-4 text-center">
                <?php
                    //Create an SQL query to get all the Revenue generated from database
                    $query = "SELECT sum(total) AS Total FROM tbl_order WHERE status='Delivered'";
                    $result = mysqli_query($connection, $query);

                    //Count rows to check whether we have food or not

                    $row = mysqli_fetch_assoc($result);

                    $total_revenue = $row['Total'];
                ?>
                <h1 style="color: green; "><?php echo $total_revenue?></h1><br>
                <h4>Revenue Generated</h4>
            </div>
            
        </div>
    </div>
    <!-- Main Content Section End -->


    <?php include('partials/footer.php'); ?>
