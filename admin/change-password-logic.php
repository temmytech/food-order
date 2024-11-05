<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    // Get the data from form
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password= $_POST['confirm_password'];

    // check whether the user with current Id and current password Exist or not
    $query = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1){
            // echo "Admin Updated";
            //check mwether the new password and confirm password match
            if($new_password==$confirm_password){
                // insert data into database
                $password_query = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id ";
                $password_result = mysqli_query($connection, $password_query);

                
            }else{
                $_SESSION['change-password'] = "password do not Match";
                header('location:' . ROOT_URL . 'admin/manage-admin.php');
                die();
            }
        }else{
            $_SESSION['change-password'] = "User not Match";
            header('location:' . ROOT_URL . 'admin/manage-admin.php');
            die();
        }
    //check whether the query executed or not
    if(!mysqli_error($connection)){
        //redirect to login with success message
        $_SESSION['change-password-success'] = "Change password Successfully.";
        header('location:' . ROOT_URL . 'admin/manage-admin.php');
        die();
    }else{
        //redirect to login with success message
        $_SESSION['change-password'] = " Fail to change password.";
        header('location:' . ROOT_URL . 'admin/manage-admin.php');
        die();
    }
}







?>

