<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $category_title = $_POST['title'];
    $previous_image = $_POST['previous_image'];
    $Featured = $_POST['feature'];
    $Active = $_POST['active'];

    
    // Validate form
    if(!$category_title){
        $_SESSION['edit-category'] = "Couldn't update Category. Invalid form data on update Category page";
    }else
    {
        // delete existing thumbnail if new thumbnail is available
        if (isset($_FILES['image']['name'])) {
            
            //Check whether the image is selected or not and set the value for image name accordingly
            $image_name= $_FILES['image']['name'];
            //Upload the image only if images is selected
            if($image_name != ""){
                //Auto rename my image name
                // Get the images extenssio (jpg, png, git etc) 
                $extension = end(explode('.', $image_name));
                //Rename the image
                $image_name = "Food_Category_".rand(000, 999).'.'.$extension;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;
                //MAKE SURE FILE IS AN IMAGE
                $allowed_files = ['png', 'jpg', 'jpeg'];
                // $extension = end(explode('.', $image_name));
                if(in_array($extension, $allowed_files)){
                    //MAKE SURE IMAGES IS NOT TOO LARGE (1MB+)
                    if($_FILES['image']['size'] < 1000000){
                        //Finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);
                    } else {
                        $_SESSION['edit-category'] = "Couldn't update Category. File size too big. should be less than 1mb";
                    }
                } else {
                    $_SESSION['edit-category'] = "Couldn't update Category. File should be png, jpg, or jpeg";
                }
                //Check whether the image is uploaded or not
                //Add if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['failed'] = "Couldn't update Category. Failed to upload Image";
                    header('location:' . ROOT_URL . 'admin/manage-category.php');
                    die();
                }
                if($image_name != ""){
                    $previous_image_path = "../images/category/". $previous_image;
                    if ($previous_image_path){
                        unlink($previous_image_path);
                    }
                }
            }else{
                //Don't upload Image and Set the image_name value as blank
                $image_name= $previous_image;
            }
        }else
        {
            //Don't upload Image and Set the image_name value as blank
            $image_name= $previous_image;
        }
    }
    if($_SESSION['edit-category']){
        header('location:' . ROOT_URL . 'admin/manage-category.php');
        die();
    }
    // set thumbnail name if a new one was uploaded, else keep old thumbnail name
    // $image_to_insert = $image_name ?? $previous_image;

    //Create SQL Query to insert category into Database
    $query = "UPDATE tbl_category SET title = '$category_title', image_name = '$image_name', featured = '$Featured', 
    active = '$Active' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if($result == true){
        //Query executed and category added
        $_SESSION['update-success'] = "<div class='success'> Category Updated Successfully.</div>";
        header('location:' . ROOT_URL . 'admin/manage-category.php');
        die();
    }else{
        //Failed to Add category
        $_SESSION['update-failed'] = " Fail to Update Category.";
        header('location:' . ROOT_URL . 'admin/manage-category.php');
        die();
    }   
    
}

?>