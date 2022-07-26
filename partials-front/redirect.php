<?php 

    //AUthorization - Access COntrol
    //CHeck whether the customer is logged in or not
    if(isset($_SESSION['customer'])) //IF customer session is set
    {
        header('location:'.SITEURL);
    }

?>