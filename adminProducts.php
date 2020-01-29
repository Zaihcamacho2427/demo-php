<?php

require_once 'header.php';
require_once 'productBusinessService.php';
require_once 'Product.php';

$bs = new productBusinessService();

$products = $bs->showAll();

?>

<div class="container">
<h2>Product Admin Results</h2>
<p>Here is what we found: </p>

<?php 
require_once '_displayAllProducts.php';

