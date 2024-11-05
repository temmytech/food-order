<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <?php if(isset($_SESSION['add-category-success'])) : ?>
                <div class="alert_message text-center success">
                    <p>
                        <?= $_SESSION['add-category-success'];
                        unset($_SESSION['add-category-success']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['edit-category'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['edit-category'];
                        unset($_SESSION['edit-category']);
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
            <?php elseif(isset($_SESSION['failed'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['failed'];
                        unset($_SESSION['failed']);
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
            <?php endif ?>    
            <br><br>
            <!-- Button to Add Category -->
            <div class="button-style">
            <a href="<?php ROOT_URL ?>add-category.php" class="btn-primary">Add Category</a>
            </div>
            <br><br>
            <div class="arrange">
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image Name</th>
                        <th>Feature</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>

                    <?php // Fetch tbl_category data from database
                    $category_query = "SELECT * FROM tbl_category";
                    $category_result = mysqli_query($connection, $category_query);
                    $sn=1;
                    $count = mysqli_num_rows($category_result);
                    //Check whether we have data in database or not
                    if($count > 0){
                        //Get the data and display
                        while ($row = mysqli_fetch_assoc($category_result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                            
                                <tr>
                                    <td><?= $sn++ ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php 
                                            //Check whether image name i available
                                            if($image_name!=""){
                                                //Diplay image
                                                ?>
                                                <img src="<?= ROOT_URL ?>images/category/<?php echo $image_name; ?>"width = "125px">
                                                <?php
                                            }else{
                                                //Diplay the message
                                                echo "<div class='error'> Image Not Added </div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $row['id'] ?>" class="btn-secondary1 size"><img src="<?= ROOT_URL ?>images/edit.png" alt=""></a>
                                        <a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $row['id'] ?>& image_name=<?php echo $image_name;?>" class="btn-danger size"><img src="<?= ROOT_URL ?>images/trash.png" alt=""></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        //We do not have Data
                        //We'll display the message inside table
                        ?> 
                        <tr>
                            <td colspan = "6"><div class="error">No Category Added.</div></td>
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