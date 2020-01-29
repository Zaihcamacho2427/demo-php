<?php
error_reporting(E_ALL);
ini_set('dispay_errors', 1);

require_once 'header.php';
require_once 'productBusinessService.php';
require_once 'Product.php';

if (isset($_GET)) {
    $productname = $_GET['productname'];
    $productprice = $_GET['productprice'];
    $productdescription = $_GET['productdescription'];
    $productphoto = $_GET['productphoto'];
} else {
    echo '<p>Nothing submitted by the form. Please go back and try again.</p>';
}

// send a new product object to the business service - . database service chain.

$bs = new productBusinessService();
$product = new Product(0, $productname, $productprice, $productdescription, $productphoto);

if ($bs->makeNew($product)) {
    echo "<div class='container'>";
    echo '<h2>Inserted New Product Successfully!!!</h2>';
    echo "<p>Inserted Product <b>" . $productname . "</b> successfully.</p>";
    echo "Click to go back to <a href='index.php'>Main menu</a>.<p>";
    echo "</div>";
}else {
    echo "<div class='container'>";
    echo '<p>Failed to add new product. Pleas try again.</p>';
    echo "</div>";
}