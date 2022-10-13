<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
  
  <title>create account</title>
    <!-- custom css file link  -->
</head>
<body>
<?php require_once("../header.php")?>


<?php 
  if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
  {
    echo $_SESSION['add']; //Display the SEssion Message if SEt
    unset($_SESSION['add']); //Remove Session Message

  }
?>

    <div class="container">
      <div class="header">
        <h2>Create Your Account</h2>
      </div>
      
      <form action="" method="post">
        <div>
          <input type="text" placeholder="Name" name="name" class="form__input" required>
        </div>
        <div>
          <input type="tel" placeholder="Number" minlength="10" maxlength="10" name="number" class="form__input" required>
        </div>
        <div>
          <input type="email" placeholder="Email (Optional)" name="email" class="form__input">
        </div>
        <div>
          <input type="text" placeholder="Address" name="address" class="form__input" required>
        </div>
        <div>
          <input type="text" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" name="pin" class="form__input" required>
        </div>
        <div>
          <input type="password" placeholder="Password" name="pass" class="form__input" required>
        </div>
        <div>
          <input type="password" placeholder="Confirm Password" name="confpass" class="form__input" required>
        </div>

        <button type="submit" name="submit">Create Account</button>
        <p>Already have an Account?<a href="login.php"><b>Login</b></a></p>
      </form>

    </div>
<?php

    $errors= array();

    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {   
        
        // Button Clicked
        //echo "Button Clicked";
        //1. Get the Data from form
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pincode = $_POST['pin'];
        $password1=md5($_POST['pass']);
        $password2 =md5($_POST['confpass']);

        
        //check db for users with same number
        $user_check="SELECT * FROM tbl_user WHERE numbers ='$number' LIMIT 1";

        $results = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($results);

        if($user){
          if($user['name']===$name){array_push($errors, "User already exist with same Number!");}
        }
        //form validation
        if($password1 != $password2){array_push($errors, "Password do not match!");}


        if(count($errors) == 0){
        //2. SQL Query to Save the data into database
          $sql = "INSERT INTO tbl_user SET
            name='$name',
            numbers='$number',
            email='$email',
            address='$address',
            pincode='$pincode',
            password='$password2' 
          ";
        
        //3. Executing Query and Saving Data into Datbase
          $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
          if($res==TRUE)
          {
          //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Account Created Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'user/login.php');
          }
          else
          {
          //FAiled to Insert DAta
          //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Create Account.</div>";
          //Redirect Page to Add Admin
            header("location:".SITEURL.'user/signup.php');
          }
        }
        else{
          foreach ($errors as $msg => $value) {
            echo "$value<br>";
          }
          
        }

    }

?>


</body>
</html>