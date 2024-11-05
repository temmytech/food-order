<?php 
require 'config/database.php';
//Check whether the id and the image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //Get the value and delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove the physical image file if it's available
    if($image_name !=""){
        //image is available so remove it
        $image_path = "../images/category/".$image_name;
        $remove = unlink($image_path);

        //If failed to remove then display an error message and stop the process
        if($remove==false){
            $_SESSION['remove'] = "Failed to removed Category image";
            die(); 
        }
    }

    // delete user from user table
    $delete_category_query = "DELETE FROM tbl_category WHERE id=$id";
    $delete_category_result = mysqli_query($connection, $delete_category_query);
    //Check whether the data is deleted from database or not
    if($delete_category_result == true){
        $_SESSION['delete-success'] = "Category Deleted Successfully";
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete-failed'] = "Failed To Delete Category";
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
    }

}     
header('location: ' . ROOT_URL . 'admin/manage-category.php');
die();
?>