
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
    echo "<div class='container'>";
    echo "<h2 style='color: red'>No Orders Found!!!</h2>";
    echo "<p>Sorry, no orders for that date range.</p>";
    echo "<div>";
    echo "<a class='btn btn-dark' href='index.php'>Return to Home Page</a>";
    exit;
} else {
    echo "<div class='container'>";
    echo "<h2>Sales Report Between " . $date1 . " and " . $date2 . "</h2>";
    echo "<br>";
    require_once '_displayOrdersReportsTable.php';
    echo "<div>";
}
