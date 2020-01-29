<?php
// expects an array of $product. Display the results in a card.

?>

<head>
<link rel="stylesheet" type="text/css" href="tables.css">
</head>

<body>

<div class="card-group">

<?php 
$dollarSign = "$";

for ($x = 0; $x < count($products); $x++) {

?>
	<div class="col-12 col-sm-6 col-md-4 col-lg-3">
		<div class="card border-dark">
    		<img class="card-img-top" src="pics/<?php echo $products[$x]['PHOTO_NAME']?>" alt="Card image cap">
    		<div class="card-body">
    			<h5 class="card-title"><?php echo "Shoe name: " . $products[$x]['PRODUCT_NAME']; ?></h5>
    			<p class="card-text"><?php echo "Shoe description: " . $products[$x]['DESCRIPTION']; ?></p>
    	
    			<p class="card-text"><?php echo "Product price: " . $dollarSign . $products[$x]['PRODUCT_PRICE']; ?></p>
    			
    			<form action="addToCart.php">
    				<input type="hidden" name="productID" value="<?php echo $products[$x]['ID']; ?>">
    				<input class="btn btn-primary" type="submit" value="Add to Cart">
    			</form>
		
			</div>
		</div>
	</div>

<?php 
}
?>
