<?php 
    //Include constants.php for SITEURL
    include('../config/constants.php');

    // logout admin
    unset($_SESSION['user']);
    unset($_SESSION['login']);

    if (!isset($_SESSION['customer']) && !isset($_SESSION['user'])) {
        session_destroy(); // Destory the Session
    }

    //2. REdirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

?>