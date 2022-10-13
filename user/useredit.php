<?php include('../config/constants.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['number']))
    {
        //Get all the details
        $number = $_GET['number'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM tbl_user WHERE numbers=$number";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Values
        $name = $row2['name'];
        $number = $row2['numbers'];
        $email = $row2['email'];
        $address = $row2['address'];
        $pincode = $row2['pincode'];

    }
    else
    {
        //Redirect to login page
        header("location:".SITEURL.'user/login.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Your Details</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name="name" value="<?php echo $name; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Number: </td>
                <td>
                    <input type="tel" placeholder="Number" minlength="10" maxlength="10" name="number" class="form__input" value="<?php echo $number;?>" required>
                </td>
            </tr>

            <tr>
                <td>Email: </td>
                <td>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </td>
            </tr>

            <tr>
                <td>Address: </td>
                <td>
                    <input type="text" placeholder="Address" name="address" class="form__input" value="<?php echo $address; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Pincode: </td>
                <td>
                    <input type="text" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" name="pin" class="form__input" value="<?php echo $pincode; ?>" required>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Update Details" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";

                //1. Get all the details from the form
                $name = $_POST['name'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $pincode = $_POST['pin'];

               
                //4. Update User in Database
                $sql3 = "UPDATE tbl_user SET 
                    name='$name',
                    numbers='$number',
                    email='$email',
                    address='$address',
                    pincode='$pincode'
                    WHERE numbers=$number
                ";

                //Execute the SQL Query
                $res3 = mysqli_query($conn, $sql3);

                //CHeck whether the query is executed or not 
                if($res3==true)
                {
                    //Query Exectued and Food Updated
                    echo "Details  Updated Successfully";
                    
                }
                else
                {
                    //Failed to Update Food
                    $_SESSION['update'] = "<div class='error'>Failed to Update Details.</div>";
                    header('location:'.SITEURL.'user/login.php');
                }

                
            }
        
        ?>

    </div>
</div>
