<?php include('partials-front/menu.php'); ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                $search = mysqli_real_escape_string($connection, $_POST['search']);
            ?>

            <h2>Foods on Your Search <a href="#" class="text-white"><?= $search ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <div class="grid-display">
                <?php

                    //Get the search keyword
                    //$search = $_POST['search'];
                    //Create an SQL query to get all the food data from database
                    $search_data_query = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";
                    $search_data_result = mysqli_query($connection, $search_data_query);

                    //Count rows to check whether we have food or not
                    $count = mysqli_num_rows($search_data_result);

                    if($count > 0){
                        //we have food in database
                        //Get the food from database and display
                        while($row = mysqli_fetch_assoc($search_data_result)){
                            $id = $row['id'];
                            $food_title = $row['title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            
                            ?>
                                <div class="food-menu-box1">
                                    <div class="food-menu-img">
                                        <?php 
                                            
                                            //Check whether we have image or not
                                            if($image_name != ""){
                                                //We have image, so display image
                                                ?>
                                                <img src="<?= ROOT_URL ?>images/food/<?= $image_name ?>" class="img-responsive img-curve">
                                                <?php
                                            }else{
                                                //We do not have image so display error message
                                                ?>
                                                <div class="error"><p>Image Not Added</p></div>
                                                <?php
                                            }
                                        ?> 
                                    </div>

                                    <div class="food-menu-desc">
                                        <h4><?= $food_title ?></h4>
                                        <p class="food-price">#<?= $price ?></p>
                                        <p class="food-detail"><?= $description ?></p>
                                        <br>

                                        <a href="<?= ROOT_URL ?>order.php?food_id=<?=$id?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            <?php
                        }
                    }else
                    {
                        //Food not added into database
                        ?> 
                            <div class="error"><p>Food Not Found</p></div>                          
                        <?php
                    }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
