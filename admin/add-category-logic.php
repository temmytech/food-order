<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    $category_title = $_POST['title'];

    //For Radio input, we need to check whether the button is seclet or not
    if(isset($_POST['feature'])){
        //Get the value from form 
        $Featured = $_POST['feature'];
    }else{
        $Featured = "No";
    }
    if(isset($_POST['active'])){
        //Get the value from form 
        $Active = $_POST['active'];
    }else{
        $Active = "No";
    }

    // Validate form
    if(!$category_title){
        $_SESSION['add-category'] = "Please enter the Category Title";
    }

    if(isset($_SESSION['add-category'])){
        //pass form data back to add category page
        $_SESSION['category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    }else{
        //Check whether the image is selected or not and set the value for image name accordingly
        if(isset($_FILES['image']['name'])){
            //To upload the image we need name, source path and destination path
            $image_name= $_FILES['image']['name'];
            //Upload the image only if images is selected
            if($image_name != "")
            {
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
                        $_SESSION['add-category'] = "File size too big. should be less than 1mb";
                    }
                } else {
                    $_SESSION['add-category'] = "File should be png, jpg, or jpeg";
                }
                //Check whether the image is uploaded or not
                //Add if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['upload'] = "Failed to upload Image";
                    header('location: ' . ROOT_URL . 'admin/add-category.php');
                    die();
                }
            }
        }else{
            //Don't upload Image and Set the image_name value as blank
            $image_name="";
        }
        //Create SQL Query to insert category into Database
        $query = "INSERT INTO tbl_category SET title = '$category_title', image_name ='$image_name', featured = '$Featured', active = '$Active'";
        $result = mysqli_query($connection, $query);

        
        if($result == true){
            //Query executed and category added
            $_SESSION['add-category-success'] = "<div class = 'success'> Category Added Successfully.</div>";
            header('location:' . ROOT_URL . 'admin/manage-category.php');
            die();
        }else{
            //Failed to Add category
            $_SESSION['add-category-failed'] = "<div class = 'error'> Fail to Add Category.";
            header('location:' . ROOT_URL . 'admin/add-category.php');
            die();
        }
    }
}

?>