<?php

require_once 'header.php';
require_once 'productBusinessService.php';
require_once 'Product.php';

$id = $_GET['id'];

$bs = new productBusinessService();

$success = $bs->deleteItem($id);

if ($success) {
    echo "<div class='container'>";
    echo '<h2>Product ' . $id . ' Deleted</h2>';
    echo '<p>Product ' . $id . ' was deleted successfully.</p>';
    echo "<p>Please click <a href='adminProducts.php'>HERE</a> to go back to the <b>Product Admin Page.</b></p>";
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo '<h2>Product Deletion Failed</h2>';
    echo '<p>Delete operation was not successful.</p>';
    echo "<p>Please click <a href='adminProducts.php'>HERE</a> to go back to the <b>Product Admin Page</b>.</p>";
    echo "</div>";
}
