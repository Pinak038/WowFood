<?php 
    include('config/constants.php');
    include('partials-front/redirect.php');
?>

<html>
    <head>
        <title>Signup - Food Order System</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Sign up</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['customerSignUp']))
                {
                    echo $_SESSION['customerSignUp'];
                    unset($_SESSION['customerSignUp']);
                }
            ?>
            <br><br>

            <!-- Signup Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Email: <br>
            <input type="email" required name="email" placeholder="Enter Email"><br><br>

            Username: <br>
            <input type="text" required name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" required name="password" placeholder="Enter Password"><br><br>
        
            Phone: <br>
            <input type="tel" required name="phone" placeholder="Enter Phone no"><br><br>

            <input type="submit" name="submit" value="Sign up" class="btn-primary">
            <br><br>
            </form>
            <!-- Signup Form Ends HEre -->

            <p class="text-center">Already have account? <a href="<?php echo SITEURL; ?>login.php">Got to Login</a></p>

            <p class="text-center">Created By - <a href="https://www.facebook.com/profile.php?id=100075443966221">Pinak</a> & <a href="https://www.facebook.com/yasmin.ema.77920">Ema</a></p>
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "INSERT INTO `tbl_customer` (`email`, `username`, `password`, `phone`) VALUES ('$email', '$username', '$password', '$phone');";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        if($res)
        {
            //customer AVailable and Login Success
            $_SESSION['customerSignUp'] = "<div class='success'>Sign Up Successful.</div>";

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'login.php');
        }
        else
        {
            //customer not Available and Login FAil
            $_SESSION['customerSignUp'] = "<div class='error text-center'>Something went wrong!</div>";
        }


    }

?>
