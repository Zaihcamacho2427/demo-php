<?php


require_once 'Cart.php';
require_once 'header.php';




require_once 'productBusinessService.php';
//require_once '_displayProductsResultsCards.php';


$id = $_GET['productID'];

if (isset($_SESSION['cart'])) {
     $c = $_SESSION['cart'];
     echo "<p>Continuing with the cart...</p>";     
} else {
    if (isset($_SESSION['userid'])) {
        $c = new Cart($_SESSION['userid']);
        echo "<p>Creating new cart...</p>";
        print_r($c);
    } else {
        echo "<p>Please login first</p>";
        ?>
        <p>Click here to <a href="showLoginForm.php"><b>Login</b></a>.</p>
        <?php 
        exit;
    }
} 
$c->addItem($id);


// echo "<pre>";
// echo "using add item method<br>";
// print_r($c);
// echo "</pre>";


$c->calcTotal();

// echo "<pre>";
// echo "using calcTotal method<br>";
// print_r($c);
// echo "</pre>";


$_SESSION['cart'] = $c;
header("Location: showCart.php");