<?php include 'partials/menu.php';


// fetch post data from database if id is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
} 

?>
<div class="main-content">
    <div class="inner-wrapper">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br>
            <br>
            <form class="tbl" action="<?= ROOT_URL ?>admin/change-password-logic.php" method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Current Password</td>
                            <td><input type="password" name="current_password" placeholder="Current Password"></td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td><input type="password" name="new_password" placeholder="New Password"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?= $id?>">
                                <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
            </form>
           
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>