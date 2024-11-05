<?php include 'partials/menu.php';

// Get back from data if there was a registration error
$Category_title = $_SESSION['category-data']['title']?? null;

//delete signup-data session
unset($_SESSION['category-data']);
?>

<div class= "main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Add Category</h1>
            <br><br>

            <?php if(isset($_SESSION['add-category'])) : ?>
                <div class="alert_message text-center error">
                    <p>
                        <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
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
            <form class="tbl" action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" value= "<?= $Category_title?>" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>Category Image: </td>
                        <td>
                            <input type="file" name="image">
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