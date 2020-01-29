<?php

require_once 'header.php';
require_once 'userBusinessService.php';


$searchPhrase = $_GET['name'];

$bs = new userBusinessService();

$persons = $bs->findByFirstNameWithAddress($searchPhrase);

?>


<h2>Search Results </h2>
<p>here is what we found: </p>

<?php
if ($persons){
    include ('_displayPeopleSearchResults.php');
}
else{
    echo "Nobody found<br>";
}

?>