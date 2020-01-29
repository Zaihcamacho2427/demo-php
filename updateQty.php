<?php 
require_once 'Cart.php';
require_once 'productBusinessService.php';
require_once 'header.php';

$productBS = new productBusinessService();
$c = $_SESSION['cart'];
$newQTY = $_GET['qty'];

$c = new Cart();

foreach ($c->getItems() as $product_id){
    $product = $productBS->findById($product_id);
    $c->updateQty($product->getID(), $newQTY);
    $c->calcTotal();
}







// foreach ($c->getItems() as $product_id => $newQTY){
//    $product = $productBS->findById($product_id);
   
//    $c->updateQty($product_id, $newQTY);
//    $c->calcTotal();
  
   
// }

// echo print_r($c);
$_SESSION['cart'] = $c;
header("Location: showCart.php");






?>