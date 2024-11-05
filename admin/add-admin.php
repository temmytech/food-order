<?php include 'partials/menu.php';

// Get back from data if there was a registration error
$full_name = $_SESSION['add-admin-data']['full_name'] ?? null;
$username = $_SESSION['add-admin-data']['username']?? null; 
$password = $_SESSION['add-admin-data']['password']?? null;

//delete signup-data session
unset($_SESSION['add-admin-data']);
?>

<div class="main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br>
            <?php if(isset($_SESSION['add-admin'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add-admin'];
                        unset($_SESSION['add-admin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <br>
            <form class="tbl" action="<?= ROOT_URL ?>admin/add-admin-logic.php" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="full_name" value="<?= $full_name?>" placeholder="Enter Your Full Name"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" value="<?= $username?>" placeholder="Enter Your Username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" value="<?= $password?>" placeholder="Enter Your password"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Admin" class="btn-secondary1">
                            </td>
                        </tr>
                    </table>
                    
            </form>
           
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>



