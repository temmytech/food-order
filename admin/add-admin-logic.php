<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    // Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form
    if(!$full_name){
        $_SESSION['add-admin'] = "Please enter your Full Name";
    } elseif (!$username){
        $_SESSION['add-admin'] = "Please enter your User Name";
    } elseif(strlen($password) < 8){
        $_SESSION['add-admin'] = "Password should be 8+ characters";
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['add-admin'])){
        //pass form data back to signup page
        $_SESSION['add-admin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-admin.php');
        die();
    } else {
        // insert data into database
        $query = " INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='password' ";
        $result = mysqli_query($connection, $query);

        if(!mysqli_error($connection)){
            //redirect to login with success message
            $_SESSION['add-admin-success'] = "New User $full_name Added Successfully.";
            header('location:' . ROOT_URL . 'admin/manage-admin.php');
            die();
        }
    }
}






?>