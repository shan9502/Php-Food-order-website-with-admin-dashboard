<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive food website</title>

   

   <!--Check if the user loged In or not   -->
   <?php include('login-check.php'); ?>

</head>
<body>
    
<!-- header section starts  -->

<?php require_once("../header.php")?>


<!-- header section ends -->


<section class="content">
    <h1 class="heading">User Details</h1>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <?php 
                $number=$_SESSION['user'];
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_user WHERE numbers='$number'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $name = $row['name'];
                        $number = $row['numbers'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $pincode = $row['pincode'];
                        ?>
                            <div class="">
                                <h6>Name:</h6><h4><?php echo $name; ?></h4>
                                <h6>Number: </h6><h4><?php echo $number; ?></h4>
                                <h6>Email: </h6><h4><?php echo $email; ?></h4>
                                <h6>Address: </h6><h4><?php echo $address; ?></h4>
                                <h6>Pincode: </h6><h4><?php echo $pincode; ?></h4>
                                <br4>
                            </div>

                        <?php
                        
                    }
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>User not found.</div>";
                    header("location:".SITEURL.'user/login.php');
                }

            ?>

            <div class="clearfix"></div>
        </div><br>
        <a href="<?php echo SITEURL; ?>user/useredit.php?number=<?php echo $number; ?>" class="btn" name="btn">Edit Details</a><br><br>
        <a href="<?php echo SITEURL; ?>user/update-password.php?number=<?php echo $number; ?>" class="btn" name="btn">Change Password</a><br><br>
        <a href="logout.php" type="submit" class="btn" name='btn'>Logout</a>

</section>

<!-- popular section ends -->
