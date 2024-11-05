<?php include('partials-front/menu.php'); ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
            //Create an SQL query to get all the food data from database
            $category_data_query = "SELECT * FROM tbl_category where active='Yes' ";
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

<?php include('partials-front/footer.php'); ?>
