<?php include('partials-front/menu.php'); ?>

<?php
if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];

    //Create an SQL query to get all the food data from database
    $category_query = "SELECT title FROM tbl_category WHERE id= '$category_id' ";
    $category_result = mysqli_query($connection, $category_query);

    $row = mysqli_fetch_assoc($category_result);
    $category_title = $row['title'];
}else{
    //Redirect to home page
    header('location: ' . ROOT_URL);
}

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <div class="grid-display">
            <?php
                $category_id = $_GET['category_id'];

                //Create an SQL query to get all the food data from database
                $food_data_query = "SELECT * FROM tbl_food where category_id='$category_id'";
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
