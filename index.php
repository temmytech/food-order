<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?= ROOT_URL ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php if(isset($_SESSION['order'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['order'];
                        unset($_SESSION['order']);
                        ?>
                    </p>
                </div>
<?php endif ?>
<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
            //Create an SQL query to get all the food data from database
            $category_data_query = "SELECT * FROM tbl_category where active='Yes'AND featured='Yes' LIMIT 3 ";
            $category_data_result = mysqli_query($connection, $category_data_query);

            //Count rows to check whether we have food or not
            $count = mysqli_num_rows($category_data_result);

            if($count > 0){
                //we have food in database
                //Get the food from database and display
                while($row = mysqli_fetch_assoc($category_data_result)){
                    $id = $row['id'];
                    $category_title = $row['title'];
                    $image_name = $row['image_name'];
                    
                    ?>
                        <a href="<?= ROOT_URL ?>category-foods.php?category_id=<?=$id?>">
                            <div class="box-3 float-container">
                                <?php 
                            
                                    //Check whether we have image or not
                                    if($image_name != ""){
                                        //We have image, so display image
                                        ?>
                                        <img src="<?= ROOT_URL ?>images/category/<?= $image_name ?>" class="img-responsive img-curve">
                                        <h3 class="float-text text-white "><?php echo $category_title;?></h3>
                                        <?php
                                    }else{
                                        //We do not have image so display error message
                                        ?>
                                        <div class="error"><p>Image Not Added</p></div>
                                        <?php
                                    }
                                ?>   
                            </div>
                        </a>
                    <?php
                }
            }else
            {
                //Food not added into database
                ?> 
                    <div class="error">Category Not Added.</div>
                <?php
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <div class="grid-display">
            <?php
                //Create an SQL query to get all the food data from database
                $food_data_query = "SELECT * FROM tbl_food where active='Yes' AND featured='Yes' LIMIT 6 ";
                $food_data_result = mysqli_query($connection, $food_data_query);

                //Count rows to check whether we have food or not
                $count = mysqli_num_rows($food_data_result);

                if($count > 0){
                    //we have food in database
                    //Get the food from database and display
                    while($row = mysqli_fetch_assoc($food_data_result)){
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
                        <div class="error">Category Not Added.</div>
                    <?php
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </div>

    <p class="text-center">
        <a href="<?= ROOT_URL ?>foods.php">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<!-- footer Section Starts Here -->
<?php include('partials-front/footer.php'); ?>
