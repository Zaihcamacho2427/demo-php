<?php

require_once 'autoLoader.php';
require_once 'OrderBusinessService.php';
require_once 'Cart.php';
require_once 'productBusinessService.php';
require_once 'checkCredit.php';
require_once 'header.php';


$owner = $_POST['owner'];
$cardnumber = $_POST['cardNumber'];
$cvv = $_POST['cvv'];
$month = $_POST['month'];
$year = $_POST['year'];



$productBS = new productBusinessService();

if ( isset($_SESSION['cart']) && (isset($_SESSION['userid'])) ) {  // change to && once verified
    $_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));
    $c = $_SESSION['cart'];
} else {
    echo "No products or you are not logged in yet.<br>";
    exit;
}

echo "<h1>Step 2</h1>";

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
echo "<hr>";
echo "<h3>Total Price: $ " . $c->getTotal_price() . "</h3>";

echo "<a class='btn btn-success' href='confirmedOrder.php'>Confirm checkout</a>";

?>

<!-- <div class="container"> -->

<!--     <form action="confirmedOrder.php" method="post"> -->
        
<!--         <div class="form-group"> -->
<!--         <button type="submit" class="btn btn-primary" id="confirm-checkout">Confirm checkout</button> -->
<!--         </div> -->
<!--     </form> -->
<!-- </div> -->

<!-- // unset($_SESSION['cart']); -->