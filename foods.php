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



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <div class="grid-display">
            <?php
                //Create an SQL query to get all the food data from database
                $food_data_query = "SELECT * FROM tbl_food where active='Yes' AND featured='Yes' ";
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
</section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
