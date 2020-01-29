<?php

//require_once 'autoLoader.php';
require_once 'OrderBusinessService.php';
require_once 'productBusinessService.php';
require_once 'Cart.php';
require_once 'header.php';

$productBS = new productBusinessService();

if ( isset($_SESSION['cart']) && (isset($_SESSION['userid'])) ) {  // change to && once verified
    $_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));
    $c = $_SESSION['cart'];
} else {
    echo "No products or you are not logged in yet.<br>";
    exit;
}

echo "<h1>Step 1</h1>";

echo "<table class='table'>";

echo "<thread class='thead-dark'>";
echo "<tr>";
echo "<th scope='col'>Product ID</th>";
echo "<th scope='col'>Product Name</th>";
echo "<th scope='col'>Quantity</th>";
echo "<th scope='col'>Product Price</th>";
echo "<th scope='col'>Subtotal</th>";
echo "</tr>";
echo "</thread>";

foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);
    echo "<tbody>";
    echo "<tr>";
    echo "<th scope='row'>" . $product->getId() . "</td>";
    echo "<td>" . $product->getName() . "</td>";
    echo "<td>" . $qty . "</td>";
    echo "<td>$ " . $product->getPrice() . "</td>";
    echo "<td>$ " . $qty * $product->getPrice() . "</td>";
    echo "</tr>";
    echo "</tbody>";
}
echo "</table>";

//echo "<h3>Total Price: " . money_format('%.2n', $c->getTotal_price()) . "</h3>";
echo "<hr>";
echo "<h3>Total Price: $ " . $c->getTotal_price() . "</h3>";

include_once '_creditCardForm.php';