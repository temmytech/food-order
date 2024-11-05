<?php include 'partials/menu.php';


// fetch post data from database if id is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_category WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
    $previous_image = $category['image_name'];
    $featured = $category['featured'];
    $active = $category['active'];

} 
else {
    header('location: ' . ROOT_URL . 'admin/add-category.php');
    die();
}
?>
<div class= "main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Edit Category</h1>
            <br><br>
            <!-- Add-category form start -->
            <form class="tbl" action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php
                            if($previous_image != ""){
                                //Display the image
                                ?>
                                <img src="<?= ROOT_URL ?>images/category/<?php echo $previous_image; ?>"width = "150px">
                                <?php
                            }else{
                                echo "<div class='alert_message error'>Image Not Added</div>";
                            }
                            
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Change Category Image: </td>
                        <td>
                            <input type="file" name="image" value="<?= $category['image_name'] ?>" id="image_name">
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
                            <input type="hidden" name="previous_image" value="<?= $category['image_name'] ?>">
                            <input type="hidden" name="id" value="<?= $category['id'] ?>">
                            <input type="submit" name="submit" value="Update Category" class= "btn-secondary1">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>