<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(isset($_SESSION['user'])) //IF user session is set
    {
        header('location:'.SITEURL.'admin/');
    }

?>