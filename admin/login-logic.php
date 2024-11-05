<?php
require('config/database.php');

if(isset($_POST['submit'])){
    // Get the data from login form
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];

    // query to check whether the user with username and password exist or not
    $query = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";
    $result = mysqli_query($connection, $query);

    //Checkn whether user exist or not
    if(mysqli_num_rows($result) == 1){
        //User Available and login success
        $_SESSION['login-success'] = "Login Successfully";
        // session for control access
        $_SESSION['user'] = $username;
        //redirect to home page or dashboard
        header('location: ' . ROOT_URL . 'admin/');
        die();

    }else{
        // usre not available
        $_SESSION['login'] = "username or password is incorrect. Failed to login";
        //redirect to home page or dashboard
        header('location: ' . ROOT_URL . 'admin/login.php');
        die();
    }

}



?>