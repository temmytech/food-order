<?php include('partials/menu.php'); 

    //logout all session
    session_destroy();

    //redirected back to login page
    header('location: ' . ROOT_URL );
?>
