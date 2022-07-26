<?php 
    //Include constants.php for SITEURL
    include('config/constants.php');

    // logout customer
    unset($_SESSION['customer']);
    unset($_SESSION['customerLogin']);

    if (!isset($_SESSION['customer']) && !isset($_SESSION['user'])) {
        session_destroy(); // Destory the Session
    }

    //2. REdirect to Login Page
    header('location:'.SITEURL.'login.php');

?>