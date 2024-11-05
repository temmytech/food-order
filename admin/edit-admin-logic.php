<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    // Get the data from form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // Validate form
    if(!$full_name){
        $_SESSION['edit-admin'] = "Couldn't update Admin. Invalid form data on update admin page";
    } elseif (!$username){
        $_SESSION['edit-admin'] = "Couldn't update Admin. Invalid form data on update admin page";
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['edit-admin'])){
        header('location: ' . ROOT_URL . 'admin/manage-admin.php');
        die();
    } else {
        // insert data into database
        $query = " UPDATE tbl_admin SET full_name='$full_name', username='$username' WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if(!mysqli_error($connection)){
            //redirect to login with success message
            $_SESSION['edit-admin-success'] = "New Admin $full_name Updated Successfully.";
            header('location:' . ROOT_URL . 'admin/manage-admin.php');
            die();
        }
    }
}






?>