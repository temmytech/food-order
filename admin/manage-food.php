<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <?php if(isset($_SESSION['add-food-success'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['add-food-success'];
                        unset($_SESSION['add-food-success']);
                        ?>
                    </p>
                </div>

            <?php elseif(isset($_SESSION['edit-food'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['edit-food'];
                        unset($_SESSION['edit-food']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['failed'])) : ?> 
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['failed'];
                        unset($_SESSION['failed']);
                        ?>
                    </p>
                </div>
                <?php elseif(isset($_SESSION['update-success'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['update-success'];
                        unset($_SESSION['update-success']);
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
            <?php elseif(isset($_SESSION['delete-success'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['delete-success'];
                        unset($_SESSION['delete-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['delete-failed'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['delete-failed'];
                        unset($_SESSION['delete-failed']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['remove'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['remove'];
                        unset($_SESSION['remove']);
                        ?>
                    </p>
                </div>
            <?php endif ?>    
            <br><br>
            <!-- Button to Add Food -->
            <div class="button-style">
            <a href="<?= ROOT_URL ?>admin/add-food.php" class="btn-primary">Add Food</a>
            </div>
            <br><br>
            <div class="arrange">
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Food Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        //Create an SQL query to get all the food data from database
                        $food_data_query = "SELECT * FROM tbl_food";
                        $food_data_result = mysqli_query($connection, $food_data_query);

                        //Count rows to check whether we have food or not
                        $count = mysqli_num_rows($food_data_result);
                        $sn = 1;

                        if($count > 0){
                            //we have food in database
                            //Get the food from database and display
                            while($row = mysqli_fetch_assoc($food_data_result)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                
                                ?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>#<?php echo $price ?></td>
                                        <td>
                                            <?php 
                                                //Check whether we have image or not
                                                if($image_name != ""){
                                                    //We have image, so display image
                                                    ?>
                                                    <img src="<?= ROOT_URL ?>images/food/<?=$image_name ?>" width = "125px" >
                                                    <?php
                                                }else{
                                                    //We do not have image so display error message
                                                    ?>
                                                    <div class="error"><p>Image Not Added</p></div>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured ?></td>
                                        <td><?php echo $active ?></td>
                                        <td>
                                            <a href="<?= ROOT_URL ?>admin/edit-food.php?id=<?= $row['id'] ?>" class="btn-secondary1 size"><img src="<?= ROOT_URL ?>images/edit.png" alt=""></a>
                                            <a href="<?= ROOT_URL ?>admin/delete-food.php?id=<?= $row['id'] ?> & image_name=<?php echo $image_name;?>" class="btn-danger size"><img src="<?= ROOT_URL ?>images/trash.png" alt=""></a>
                                            
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else
                        {
                            //Food not added into database
                            ?> 
                                <tr>
                                    <td colspan = "7"><div class="error">Food Not Added.</div></td>
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