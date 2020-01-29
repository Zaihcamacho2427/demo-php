<?php

require_once 'OrderDataService.php';
require_once 'Order.php';

class OrdersBusinessService {
    
    
    function checkOut($cart) {
        $db = new Database();
        $conn = $db->getConnection();
        $conn->autocommit(false);
        $conn->begin_transaction();
        
//         $checkingBalance = $this->getCheckingBalance();
//         $checking = new CheckingAccountDataService($conn);
//         $okChecking = $checking->updateBalance($checkingBalance - $transfer);
        
//         $savingBalance = $this->getSavingBalance();
//         $saving = new SavingAccountDataService($conn);
//         $okSaving = $saving->updateBalance($savingBalance + $transfer);
        
//         echo "Checking: " . $okChecking;
//         echo "Saving: " . $okSaving;
        
        //create a new order
        $order = new OrderDataService($conn);
        //store the return value from the createNew method into a new variable
        $newOrder = $order->createNew($order);
        
        
        //call the addDetailsLine method using $newOrder as the order id for addDetailsLine
        $newOrderLine = $order->addDetailsLine($newOrder, $orderDetails);
        echo "Before if commit";
        if ($newOrder && $newOrderLine) {
            echo "Committed";
            $conn->commit();
        } else {
            echo "Rolback";
            $conn->rollback();
        }
        echo "After if commit";
        
        $conn->close();
    }
    
    function makeNew($order, $conn) {
        
        $dbService = new OrderDataService();
        return $dbService->createNew($order, $conn);
    }
    
    function getAllOrders() {
        
        $dbService = new OrderDataService();
        $orders = $dbService->getAlOrders();
        
        return $orders;
    }
    
    function deleteItem($id) {
        
        $dbService = new OrderDataService();
        return $dbService->deleteItem($id);
    }
    
    function findById($id) {
        
        $dbService = new OrderDataService();
        $orders = $dbService->findbyID($id);
        
        return $orders;
    }
    
    function updateONe($id, $order) {
        
        $dbService = new OrderDataService();
        return $dbService->updateOne($id, $order);
    }
    
    function getOrderDetais($id) {
        
        $dbService = new OrderDataService();
        return $dbService->getOrderDetails($id);
    }
    
    function getOrdersBetweenDates($date1, $date2) {
        $report = array();
        
        $dbService = new OrderDataService();
        $report = $dbService->getOrdersBetweenDates($date1, $date2);
        
        return $report;
    }
    
}