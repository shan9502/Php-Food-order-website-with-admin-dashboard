<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive food website design tutorial </title>

</head>
<body>
    
<!-- header section starts  -->

<?php require_once("header.php")?>


<!-- header section ends -->

<!--------cart items details --------->
<div class="small-container cart-page">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h2>My Orders</h2>
                <hr>
                <table>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>

                <?php
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $food_id = array_column($_SESSION['cart'], 'food_id');

                        $res=mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)){
                            foreach ($food_id as $id){
                                if ($row['id'] == $id){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    $total = $total + (int)$row['price'];
                ?>

                                        <tr>
                                            <td>
                                                <div class="cart-info">
                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                    <div>
                                                        <p><?php echo $title; ?></p>
                                                        <h4>Price:₹<?php echo $price; ?></h4><input type="hidden" class="iprice" value="<?=$price?>">
                                                        <form action="addcart.php" method="post">
                                                            <button type="submit" name="remove_item">Remove</button>
                                                            <input type="hidden" name="food_id" value="<?=$id?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                                <td><input class="iquantity" onchange="subTotal()" type="number" value="1" min='1'>quanity</td>
                                                <td class='itotal'></td>
                                        </tr>
                                        
                                 <?php   
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
                </table>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h4>PRICE DETAILS</h4>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h4>Price ($count items)</h4>";
                                echo"";
                            }else{
                                echo "<h4>Price (0 items)</h4>";
                            }
                        ?>

                        <h4 name='gtotal'></h4>
                        <hr>
                        <h4>Delivery Charges</h4>
                        <h5 class="text-success">FREE</h5>
                        <hr>
                        <h4>Amount Payable</h4>
                        <h4 name='gtotal'></h4>
                    </div>
                </div>

            </div>

        </div>
        <a href="deliverydetails.php" type="submit" class="btn offset-md-1 border rounded mt-5 bg-white" name='btn'>Confirm Order</a>
        
    </div>


</div>

<!--------cart items details ends--------->

<!-- steps section starts

<div class="step-container">

    <h1 class="heading">how it <span>works</span></h1>

    <section class="steps">

        <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>choose your favorite food</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>free and fast delivery</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>easy payments methods</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>and finally, enjoy your food</h3>
        </div>
    
    </section>

</div>

 steps section ends -->


<!-- footer section  -->

<section class="footer">

    <div class="share">
        <a href="#" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#" class="btn">instagram</a>
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>

    <h1 class="credit"> maintained by <span>sanoobar shan </span> | all rights reserved! </h1>

</section>






<!-- custom js file link  -->
<script>
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');

    var gtotal=document.getElementsByName('gtotal')[0,1];


    function subTotal() {
        gt=0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText=gt;

    }

    subTotal();

</script>

<script src="js/script.js"></script>


</body>
</html>