<?php
require_once 'header.php';
?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>User Search Page</title>
</head>
<body>

<div class="container">
    <h1>User Search</h1>
    <form action="personSearchHandler.php">
    <p>Enter a user by first name:</p>
    <input type="text" name="name"></input><br><br>
    <input type="submit" value="Search"></input>
    </form>
</div>
</body>
</html>