<?php
require_once 'Database.php';
require_once 'Person.php';


class userDataService{
    
    function findAddressByUserId($n){
        $db = new Database();
        $connection = $db->getConnection();
        
        $stmt = $connection->prepare("SELECT * FROM ADDRESSES WHERE USERS_ID = ? LIMIT 1");
        
        $stmt->bind_param("s", $n);
        
        $result = $stmt->get_result();
        
        return $result;
        
    }
    
    function findByID($n){
        $db = new Database();
        
        $connection = $db->getConnection();
   
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE ID = ? LIMIT 1");
        
        $stmt->bind_param("s", $n);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
  
        if ($result->num_rows == 0){
            echo "Didn't find any results<br>";
        }
        else{
            $personArray = array();
            while($person = $result->fetch_assoc()){
                array_push($personArray, $person);
            }
            $p = new Person($personArray[0]['ID'], $personArray[0]['FIRST_NAME'], $personArray[0]['LAST_NAME'], $personArray[0]['USER_NAME'],$personArray[0]['ROLE'], $personArray[0]['PASSWORD']);
            return $p;
        }
        
    }
    
    function findByFirstName($n){
        
        
        $db = new Database();
        $connection = $db->getConnection();
//         echo "testing db data<br>";
       // print_r($db);
  
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE FIRST_NAME LIKE ?");
        $like_n = "%" . $n . "%";
        //s stands for string for "First_Name"
        $stmt->bind_param("s", $like_n);
        
        $stmt->execute();
    
        $result = $stmt->get_result();
        if (!$result){
            echo "Assume the sql statement has an error";
        }
        if ($result->num_rows == 0){

            return "Nothing came back dog sry lol<br>";
            
        }
        else{
            $person_array = array();
            while ($person = $result->fetch_assoc()){
//             print_r($person);
//             echo"<br>";
//             echo "Person name: " . $person['FIRST_NAME'] . " " .$person['LAST_NAME'] . ", and age " . $person['Age'];    

                array_push($person_array, $person);
            }
            return $person_array;  
        }
    }
    function findByLastName($n){
        
        $db = new Database();
        
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME FROM USERS WHERE LAST_NAME LIKE ?");
        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result == 0){
            echo "No results came back";
        }
        else{
            $person_array = array();
            while ($person = $result->fetch_assoc()){
                array_push($person_array, $person);
            }
            return $person_array;
        }
        
    }
    
    
    function deleteID($id){
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = ? LIMIT 1");
        if (!$stmt){
            echo "something wrong in binding";
            exit;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }

    }
    
    function updateOne($id, $person){
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRST_NAME = ?, LAST_NAME = ?, USER_NAME = ?, ROLE = ?, PASSWORD = ? WHERE ID = ? LIMIT 1");
      
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $us = $person->getuserName();
        $role = $person->getRole();
        $pw = $person->getPassword();
        //string, string, string, integer
        $stmt->bind_param("sssssi", $fn, $ln, $us, $role, $pw, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0){
            echo "Updating person: <br>";
            return true;
        }
        else{
            return false;
        }
    }
    
    function addOne($person){
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO USERS (FIRST_NAME, LAST_NAME, USER_NAME, ROLE, PASSWORD) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt){
            echo "Something went wrong in the binding process. sql error?";
            exit;
        }
        
        $fn = $person->getFirst_name();
        $ln = $person->getLast_name();
        $un = $person->getuserName();
        $role = $person->getRole();
        $password = $person->getPassword();
        
        //string, string, string, integer
        $stmt->bind_param("sssss", $fn, $ln, $un , $role, $password);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    function findByFirstNameWithAddress($n){
        
        $db = new Database();
        $connection = $db->getConnection();
        //         echo "testing db data<br>";
        // print_r($db);
        
        $stmt = $connection->prepare("SELECT USERS.ID, FIRST_NAME, LAST_NAME, STREET, CITY, STATE, ZIP
        FROM USERS
        JOIN ADDRESSES
        ON USERS.ID = ADDRESSES.USERS_ID
        WHERE FIRST_NAME LIKE ?");
        $like_n = "%" . $n . "%";
        //s stands for string for "First_Name"
        $stmt->bind_param("s", $like_n);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        if (!$result){
            echo "Assume the sql statement has an error";
        }
        if ($result->num_rows == 0){
            
            return "Nothing came back dog sry lol<br>";
            
        }
        else{
            $person_array = array();
            while ($person = $result->fetch_assoc()){
                //             print_r($person);
                //             echo"<br>";
                //             echo "Person name: " . $person['FIRST_NAME'] . " " .$person['LAST_NAME'] . ", and age " . $person['Age'];
                
                array_push($person_array, $person);
            }
            return $person_array;
        }
        
        
    }

    function showAll() {
        // Returns an array of persons. Every in the database.
        
        $db = new Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT ID, FIRST_NAME, LAST_NAME,
            USER_NAME, PASSWORD, ROLE
            FROM USERS;");
        
        
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
            
            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            return $person_array;
        }
    }
    

}

