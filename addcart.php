<?php
session_start();

if (isset($_POST['btn'])){
    //print_r($_POST['food_id']);
	if(isset($_SESSION['cart'])){
		$item_array_id = array_column($_SESSION['cart'], "food_id");
		if(in_array($_POST['food_id'], $item_array_id)){
			echo "<script>
                    alert('Item is already added into the orders..!');
                    window.location.href='index.php#popular';
                </script>";
        }else{
        	$count = count($_SESSION['cart']);
            $item_array = array(
            	'food_id' => $_POST['food_id']
            );
            $_SESSION['cart'][$count] = $item_array;
            echo"<script>
                    window.location.href='index.php#popular';
                </script>";
        }
    }else{
    	$item_array = array('food_id' => $_POST['food_id']);
        //new session variable
    	$_SESSION['cart'][0] = $item_array;
    	//print_r($_SESSION['cart']);	
        echo"<script>
                    window.location.href='index.php#popular';
            </script>";
    }
}

if(isset($_POST['remove_item'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if($value['food_id'] ==$_POST['food_id']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                    alert('Item Removed');
                    window.location.href='cart.php';
                </script>";
            }
        }
        
    }
?>