<?php

require_once 'autoLoader.php';
require_once 'CreditCardService.php';
require_once 'header.php';

$owner = $_POST['owner'];
$cardnumber = $_POST['cardNumber'];
$cvv = $_POST['cvv'];
$month = $_POST['month'];
$year = $_POST['year'];

$ccservice = new CreditCardService($owner, $cardnumber, $cvv, $month, $year);
if ($ccservice->authenticate()) {
    echo "<h3>Authenticated!</h3>";
} else {
    echo "<h3>Credit card failed!</h3>";
    echo " Click to go back for <a href='processCheckout.php'>Payment</a>.<p>";
    exit;
}