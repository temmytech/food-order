<?php 
require 'config/database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Fetch user from database
    $query = "SELECT * FROM tbl_admin WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $admin = mysqli_fetch_assoc($result);

    // delete user from user table
    $delete_admin_query = "DELETE FROM tbl_admin WHERE id=$id";
    $delete_admin_result = mysqli_query($connection, $delete_admin_query);
    if(mysqli_errno($connection)){
        $_SESSION['delete-admin'] = "couldn't delete user {$admin['full_name']} ";
    } else {
        $_SESSION['delete-admin-success'] = "delete user {$admin['full_name']} successfully";
    }

}     
header('location: ' . ROOT_URL . 'admin/manage-admin.php');
die();
?>