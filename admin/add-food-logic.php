<?php
require('config/database.php');


// Process the value from form and save it in database
if(isset($_POST['submit'])) {
    $food_title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
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
    if(!$food_title){
        $_SESSION['add-food'] = "Please enter the Food Title";
    }elseif (!$description){
        $_SESSION['add-food'] = "Please enter the description of the food";
    }elseif (!$price){
        $_SESSION['add-food'] = "Please enter the price of the food";
    }

    if(isset($_SESSION['add-food'])){
        //pass form data back to add category page
        $_SESSION['food-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-food.php');
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
                $image_name = "Food_Name_".rand(000, 999).'.'.$extension;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;
                //MAKE SURE FILE IS AN IMAGE
                $allowed_files = ['png', 'jpg', 'jpeg'];
                // $extension = end(explode('.', $image_name));
                if(in_array($extension, $allowed_files)){
                    //MAKE SURE IMAGES IS NOT TOO LARGE (1MB+)
                    if($_FILES['image']['size'] < 1000000){
                        //Finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);
                    } else {
                        $_SESSION['add-food'] = "File size too big. should be less than 1mb";
                    }
                } else {
                    $_SESSION['add-food'] = "File should be png, jpg, or jpeg";
                }
                //Check whether the image is uploaded or not
                //Add if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['upload'] = "Failed to upload Image";
                    header('location: ' . ROOT_URL . 'admin/add-food.php');
                    die();
                }
            }
        }else{
            //Don't upload Image and Set the image_name value as blank
            $image_name="";
        }
        // //Create SQL Query to insert category into Database
        $food_query = "INSERT INTO tbl_food SET title = '$food_title', description = '$description', price = $price, image_name = '$image_name', 
        category_id = $category, featured = '$Featured', active = '$Active' ";
        $result = mysqli_query($connection, $food_query);

        if($result == true){
            //Query executed and category added
            $_SESSION['add-food-success'] = "<div class = 'success'> Food Added Successfully.</div>";
            header('location:' . ROOT_URL . 'admin/manage-food.php');
            die();
        }else{
            //Failed to Add category
            $_SESSION['add-food-failed'] = "<div class = 'error'> Fail to Add Food.";
            header('location:' . ROOT_URL . 'admin/add-food.php');
            die();
        }
    }
}

?>