<?php
require_once 'OrderBusinessService.php';
require_once 'Cart.php';
require_once 'header.php';


if ( isset($_SESSION['cart']) && (isset($_SESSION['userid'])) ) {  // change to && once verified
    $_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));
    $c = $_SESSION['cart'];
} else {
    echo "No products or you are not logged in yet.<br>";
    exit;
}

$bs = new OrdersBusinessService();
$bs->checkOut($c);