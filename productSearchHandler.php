<?php
require_once 'header.php'; 
require_once 'productBusinessService.php';



$searchPhrase = $_GET['productName'];

$bs = new productBusinessService();

$products = $bs->findByProductName($searchPhrase);



?>


<div class="container">
<h2>Search Results </h2>
<p>here is what we found: </p>

<?php
if ($products){
    include ('_displayProductsResultsCards.php');
}
else{
    echo "No products found<br>";
}

?>
</div>