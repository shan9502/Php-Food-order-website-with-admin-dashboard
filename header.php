
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="http://localhost/FoodWP/index.php#home" class="logo"><i class="fas fa-utensils"></i>food <div id="menu-bar" class="fas fa-bars"></div></a>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="http://localhost/FoodWP/css/style.css">

    <?php
    $count=0;
    if(isset($_SESSION['cart'])){
        $count=count($_SESSION['cart']);
    }
    ?>
   

    <nav class="navbar">
        <a href="http://localhost/FoodWP/index.php#home">home</a>
        <a href="http://localhost/FoodWP/index.php#speciality">speciality</a>
        <a href="http://localhost/FoodWP/index.php#popular">popular</a>
        <a href="http://localhost/FoodWP/index.php#gallery">gallery</a>
       <!-- <a href="#review">review</a> -->
    </nav>
    <h2 class="icons-header">
        <a href="http://localhost/FoodWP/user/userdetails.php"><i class="fas fa-user"></i><p class="caption">Account</p></a>
        <a href="http://localhost/FoodWP/cart.php"><i class="fas fa-shopping-cart "></i><p class="caption">Orders<span id="cart-count"class="text-warning bg-secondary"><?php echo $count; ?></span></p></a>
    </h2>
</header>
    
