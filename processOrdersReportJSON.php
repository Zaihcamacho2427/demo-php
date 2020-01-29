
<?php


require_once 'autoLoader.php';
require_once 'header.php';
require_once 'OrderBusinessService.php';
require_once 'userBusinessService.php';

$date1 = $_GET['startdate'];
$date2 = $_GET['enddate'];

$orderbs = new OrdersBusinessService();
//$userbs = new UserBusinessService();

$saleReport = $orderbs->getOrdersBetweenDates($date1, $date2);

if ($saleReport == null) {
    echo "No Orders Found!!!";
    exit;
} else {
   echo json_encode($saleReport, JSON_PRETTY_PRINT) . "<br>";
}
