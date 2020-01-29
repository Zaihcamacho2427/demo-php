<?php


require_once 'header.php';
require_once 'userBusinessService.php';
require_once 'Person.php';

$bs = new userBusinessService();



$persons = $bs->showAll();

 

?>

<div class="container">
<h2>User Admin Results</h2>
<p>Here is what we found: </p>

<?php 
require_once '_displayAllUsers.php';

