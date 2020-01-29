<?php
require_once 'Database.php';
require_once 'Product.php';

class productServiceData
{
    public function findByProductName($n){
        
        $db = new Database();
        
        $connection = $db->getConnection();
        
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRODUCT_PRICE, PHOTO_NAME FROM PRODUCTS WHERE PRODUCT_NAME LIKE ?");
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result == 0){
            echo "Didn't find any results<br>";
        }
        else{
            $productArray = array();
            while($person = $result->fetch_assoc()){
                array_push($productArray, $person);
            }
            return $productArray;
        }
        
    }
    function showAll() {
        // Returns an array of persons. Every in the database.
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION,
            PRODUCT_PRICE, PHOTO_NAME
            FROM PRODUCTS;");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
        
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
            //echo "I found " . $result->num_rows . " results!<br>";
            
            $product_array = array();
            while ($product = $result->fetch_assoc()) {
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    function findById($id) {
        // id is the number; returns a product object
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, PRODUCT_NAME, DESCRIPTION, PRODUCT_PRICE, PHOTO_NAME
                      FROM `PRODUCTS` WHERE `ID` = ? LIMIT 1");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
        
        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);
        
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
            $products_array = array();
            while ($p = $result->fetch_assoc()) {
                array_push($products_array, $p);
            }
            $p = new Product($products_array[0]['ID'], $products_array[0]['PRODUCT_NAME'], $products_array[0]['PRODUCT_PRICE'],
                $products_array[0]['DESCRIPTION'],$products_array[0]['PHOTO_NAME']);
            return $p;
        }
    }
    
    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM PRODUCTS WHERE ID = ? LIMIT 1;");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
        
        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    function makeNew($p) {
        // Accepts a $product object. Inserts a new product into the poducts table.
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO PRODUCTS (PRODUCT_NAME, PRODUCT_PRICE, DESCRIPTION, PHOTO_NAME)
                                      VALUES (?, ?, ?, ?)");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
       
        $pn = $p->getName();
        $pp = $p->getPrice();
        $pd = $p->getDescription();
        $pph = $p->getPhoto();

        
        $stmt->bind_param("ssss", $pn, $pp, $pd, $pph);
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function updateOne($id, $person) {
        // $id is the number to update; $person is the item to change
        // returns a true (success) or false (failure)
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRST_NAME = ?, LAST_NAME = ?, USER_NAME = ?,
                                      ROLE = ?, PASSWORD = ?
                                      WHERE ID = ? LIMIT 1;");
        
        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $un = $person->getuserName();
        $role = $person->getRole();
        $pw = $person->getPassword();
        
        $stmt->bind_param("sssss", $fn, $ln, $un, $role, $pw);
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
        
    }
}

