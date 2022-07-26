<?php 

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of User to be deleted
    $id = $_GET['id'];
    // 2. Create a Query to delete the Admin
    $sql = "DELETE FROM tbl_customer WHERE id = $id";
    $sql1 = "select * from tbl_customer where id = $id";
    // 3. Execute the Query
    $res = mysqli_query($conn, $sql);
    $res1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($res1);
    $username = $row['username'];
    // 4. Check if the Query is Executed Successfully or not
    if($res == true)
    {
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
             unset($_SESSION['customer']);
             unset($_SESSION['customerLogin']);
        
        // 5. If Query is Executed Successfully, redirect the Admin to Manage Admins Page
        header('location:'.SITEURL.'admin/manage-users.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='failed'>User is not </div>";
        // 6. If Query is not Executed Successfully, redirect the Admin to Manage Admins Page
        header('location:'.SITEURL.'admin/manage-users.php');
    }

?>