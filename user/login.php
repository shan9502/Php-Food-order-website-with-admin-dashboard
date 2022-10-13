<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>
<body>


 <?php 
 if(isset($_SESSION['login']))
 {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
if(isset($_SESSION['no-login-message']))
{
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
?>


<div class="user">
    <header class="user__header">
        <h1 class="user__title">Login</h1>
    </header>
    
    <form action="" method="post" class="form">
        
        <div class="form__group">
            <input type="tel" placeholder="Number" minlength="10" maxlength="10" name="number" required>
        </div>
        <div>
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <button type="submit" name='submit'>Login</button>
        <p>Don't have an Account?<a href="signup.php"><b>Create Your Account</b></a></p>
        
    </form>


</div>

<?php
//CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        echo "button clicked";
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_user WHERE numbers='$number' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            echo "login Successful";
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $number; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'user/userdetails.php');
        }
        else
        {
            echo "login failed";
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Number or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'user/login.php');
        }


    }


?>

</body>
</html>