<?php
require_once 'header.php';
?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Product Search Page</title>
</head>
<body>

<div class="container">
    <h1>Product Search</h1>
    <form action="ProductSearchHandler.php">
    <p>Enter the name of a product:</p>
    <input type="text" name="name"></input><br><br>
    <input type="submit" value="Search"></input>
    </form>
</div>
</body>
</html>