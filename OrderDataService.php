<?php
require_once 'autoLoader.php';
require_once 'userDataService.php';
require_once 'Cart.php';
require_once 'Order.php';

class OrderDataService {
    
    private $conn;
    
//     function __construct($conn){
//         $this->conn = $conn;
//     }
    
    function deleteItem($id) {
        
    }
    
    function findByID($id) {
        
    }
    
    function getAllOrders() {
        
    }
    
    function updateOne($id, $order) {
        
    }
    
    function createNew($order) {
        
        /*
         * private $date;
    private $users_ID;
    private $addresses_id;
    private $total;
         */
        
//         $db = new Database();
//         $connection = $db->getConnection();
        
        $stmt = $this->conn->prepare("INSERT INTO ORDERS (DATE, TOTAL_PRICE, USERS_ID, ADDRESSES_ID)
                                      VALUES (?, ?, ?, ?)");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
//         $cart2 = new Cart($cart->getUserid());
        
//         //$order_id2 = $cart2-
//         $user_id2 = $cart2->getUserid();
//         $date = new DateTime();
//         $AZTZ = new DateTimeZone('America/Tijuana');
//         $date->setTimezone($AZTZ);
//         $uds = new userDataService();
//         $address = $uds->findAddressByUserId($user_id2);
//         $total = $cart2->getTotal_price();
        
        
        
        
        
        //echo $date . " date here";
        
        
        
        
        
        
        $order_id = $order->getId();
        $order_date = $order->getDate();
        $order_total = $order->getTotal();
        $user_id = $order->getUser_id();
        $user_address__id = $order->getAddress_id();
        

        $stmt->bind_param("siii", $order_date, $order_total, $user_id, $user_address__id);
        $stmt->execute();
        
        if ($stmt->affectedrows > 0) {
            //$connection->close();
            return $this->conn->insert_id;
        } else {
            //$connection->close();
            echo "Nothing inserted into the database during new order process.";
            return false;
        }
    }
    
    function addDetailsLine($order_id, $specificProduct) {
        
        $stmt = $this->conn->prepare("INSERT INTO ORDERDETAILS (QUANTITY, CURRENTPRICE, CURRENTDESCRIPTION, ORDERS_ID, PRODUCTS_ID) 
VALUES (?, ?, ?, ?, ?)");
        if(!$stmt) {
            echo "Something wrong in the binding process. SQL statement error?";
            return -1;
        }
        
        //create fake Order to use methods
        //Order order = new Order(......);
        $quantity = $specificProduct->getQuantity();
        $price = $specificProduct->getCurrent_price();
        $description = $specificProduct->getCurrent_description();
        $product_id = $specificProduct->getProduct_id();
        
        $stmt->bind_param("idsii", $quantity, $price, $description, $order_id, $product_id);
        $stmt->execute();
        
        if ($stmt->affected_rows() > 0) {
            return $this->conn->insert_id;
        } else {
            return -1;
        }
    }
    
    
    function getOrdersBetweenDates($date1, $date2) {
        
        $db = new Database();
        $connection = $db->getConnection();
        
        $stmt = $connection->prepare("SELECT `ID`, `DATE`, `TOTAL_PRICE`, `USERS_ID`, `ADDRESSES_ID`
                                      FROM `ORDERS` WHERE `DATE` BETWEEN ? AND ?");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
        
        $stmt->bind_param("ss", $date1, $date2);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }
        
        if ($result->num_rows == 0) {
            return null;
        } else {
            $report_array = array();
            
            while ($report = $result->fetch_assoc()) {
                array_push($report_array, $report);
            }
            return $report_array;
        }
    }
    

    
    function getOrderWithDetails($id) {
        
    }
}