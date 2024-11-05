<?php include 'partials/menu.php';

    // fetch post data from database if id is set
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_food WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $food = mysqli_fetch_assoc($result);
        $previous_image = $food['image_name'];
        $featured = $food['featured'];
        $active = $food['active'];

    } 
    else {
        header('location: ' . ROOT_URL . 'admin/add-food.php');
        die();
    }
?>

<div class= "main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Update Food</h1>
            <br><br>
            <!-- Add-category form start -->
            <form class="tbl" action="<?= ROOT_URL ?>admin/edit-food-logic.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" value= "<?= $food['title'] ?>" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="set">
                                <h4>Description:</h4>
                                <textarea name="description" cols="30" rows="5" value= "<?= $food['description'] ?>" placeholder="Description of the food"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" value= "<?= $food['price'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><h4>Current Image: <h4></td>
                        <td>
                            <?php
                            if($previous_image != ""){
                                //Display the image
                                ?>
                                <img src="<?= ROOT_URL ?>images/food/<?php echo $previous_image; ?>"width = "150px">
                                <?php
                            }else{
                                echo "<div class='alert_message error'>Image Not Added</div>";
                            }
                            
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Change Food Image: </td>
                        <td>
                        <input type="file" name="image" value="<?= $food['image_name'] ?>" id="image_name">
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
                                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="feature" value="Yes">Yes
                                <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="feature" value="No">No
                            </div>
                            <div class="check">
                                <h4>Active:</h4>
                                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                                <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="previous_image" value="<?= $food['image_name'] ?>">
                            <input type="hidden" name="id" value="<?= $food['id'] ?>">
                            <input type="submit" name="submit" placeholder= "submit" class= "btn-secondary1">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'?>