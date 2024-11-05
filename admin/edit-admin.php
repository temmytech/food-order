<?php include 'partials/menu.php';


// fetch post data from database if id is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_admin WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $admin = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/add-admin.php');
    die();
}
?>
<div class="main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Edit Admin</h1>
            <br>
            <br>
            <form class="tbl" action="<?= ROOT_URL ?>admin/edit-admin-logic.php" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="full_name" value="<?= $admin['full_name'] ?>" placeholder="Enter Your Full Name"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" value="<?= $admin['username']?>" placeholder="Enter Your Username"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?= $admin['id']?>">
                                <input type="submit" name="submit" value="Update Admin" class="btn-secondary1">
                            </td>
                        </tr>
                    </table>
            </form>
           
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>