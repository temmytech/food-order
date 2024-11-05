<?php include 'partials/menu.php';

// // Get back from data if there was a registration error
$food_title = $_SESSION['food-data']['title'] ?? null;
$description = $_SESSION['food-data']['description'] ?? null;
$price = $_SESSION['food-data']['price'] ?? null;

//delete signup-data session
unset($_SESSION['food-data']);
?>

<div class= "main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Add Food</h1>
            <br><br>

            <?php if(isset($_SESSION['add-food'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['add-food'];
                        unset($_SESSION['add-food']);
                        ?>
                    </p>
                </div>
            <?php elseif(isset($_SESSION['upload'])) : ?> 
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['upload'];
                        unset($_SESSION['upload']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <!-- Add-category form start -->
            <form class="tbl" action="<?= ROOT_URL ?>admin/add-food-logic.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" value= "<?= $food_title ?>" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Description:</h4>
                                <textarea name="description" cols="30" rows="5" id="<?= $description ?>" placeholder="Description of the food"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" value= "<?= $price ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <div class="set">
                                <h4>Category:</h4>
                                <select name="category">
                                    <?php
                                        //Create php code to display categories from database
                                        $query = "SELECT * FROM tbl_category where active='Yes'";
                                        $result = mysqli_query($connection, $query);

                                        //Count rows to check whether we have category or not
                                        $count = mysqli_num_rows($result);
                                        if($count > 0){
                                            //we have categories
                                            while($row = mysqli_fetch_assoc($result)){
                                                //Got the details of category
                                                $id = $row['id'];
                                                $title = $row['title'];

                                                ?>
                                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                                <?php
                                            }
                                        }else{
                                            //we did not have category
                                            ?>
                                                <option value="0">"No Category Found"</option>
                                            <?php
                                        }
                                    ?>  
                                </select>
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td >
                            <div class="check">
                                <h4>Feature:</h4>
                                <input type="radio" name="feature" value="Yes">Yes
                                <input type="radio" name="feature" value="No">No
                            </div>
                            <div class="check">
                                <h4>Active:</h4>
                                <input type="radio" name="active" value="Yes">Yes
                                <input type="radio" name="active" value="No">No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" placeholder= "submit" class= "btn-secondary1">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'?>