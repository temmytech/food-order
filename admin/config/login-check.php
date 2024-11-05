<?php

if(!isset($_SESSION['user'])){

    $_SESSION['login-check'] = "Please you did not have access to the admin panel. please login ";


    //redirected back to login page
    header('location: ' . ROOT_URL . 'admin/login.php');
}
?>