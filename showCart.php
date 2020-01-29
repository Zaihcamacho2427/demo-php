<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'productBusinessService.php';
require_once 'userBusinessService.php';
require_once 'Cart.php';
require_once 'header.php';
// require_once 'addToCart.php';



//echo "<div class='container'><h1>Cart coming soon...</h1></div>";


$productBS = new productBusinessService();
$userBS = new userBusinessService();

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    echo "<p>Nothing in the cart yet.</p>";
    exit;
}
// print_r($c);

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
} else {
    echo "<p>You are not logged in yet.</p>";
    exit;
}

if ($c->getUserid() != $userid) {
    echo "<p>It appears that this cart does not belong to you. Please login again.</p>";
    exit;
}

$user = $userBS->findById($userid);
echo "<h2>View Cart</h2>";
echo "<p>Cart for user: " . $user->getFirst_name() . "</p>";

setlocale(LC_MONETARY, 'en_US.UTF-8');

echo "<table class='table table-striped table-bordered table-hover table-dark'>";
//table header
echo "<thead class='thead-light'>";

//     echo "<td>Product ID</td>";
//     echo "<td>Product Name</td>";
//     echo "<td>Description</td>";
//     echo "<td>Photo</td>";
//     echo "<td>Quantity</td>";
//     echo "<td>Price Each</td>";
//     echo "<td>Subtotal</td>";
//     echo "<tr>";

   echo "<th scope='col'>Product ID</th>";
   echo "<th scope='col'>Product Name</th>";
   echo "<th scope='col'>Description</th>";
    echo "<th scope='col'>Photo</th>";
    echo "<th scope='col'>Quantity</th>";
    echo "<th scope='col'>Price</th>";
    echo "<th scope='col'>Subtotal</th>";
    echo "</tr>";

echo "</thead>";

foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);
    //table row
    echo "<tr>";
    
        echo "<td>" . $product->getId() . "</td>";
        echo "<td>" . $product->getName() . "</td>";
        echo "<td>" . $product->getDescription() . "</td>";
        echo "<td><img height='120' src='pics/" . $product->getPhoto() . "'></td>";
        echo "<td>";
            echo "<form action='updateQty.php'>";
                echo "<input type='hidden' name='id' value=" . $product->getId() . ">";
                echo "<span class='input-group-text'>";
                echo "<input class='form-control' type='text' name='qty' value=" . $qty . ">";
                echo "<input class='btn btn-secondary' type='submit' name='submit' value='update'>";
                echo "</span>";
            echo "</form>";
        echo "</td>";
        echo "<td>" . money_format('%.2n', $product->getPrice()) . "</td>";
        echo "<td>" . money_format('%.2n', $qty * $product->getPrice()) . "</td>";
    
    echo "</tr>";
 

}

echo "</table>";

echo "<h3>Total Price: " . money_format('%.2n', $c->getTotal_price()) . "</h3>";
echo "<a class='btn btn-primary' href='productSearchHandler.php'>Continue Shopping</a>";
echo "<a class='btn btn-success' href='processCheckout.php'>Checkout</a>";