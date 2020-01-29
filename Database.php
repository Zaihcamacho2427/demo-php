<?php
class Database{
    
    
    private $dbservername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "root";
    private $dbname = "php2-store";
    
    function getConnection(){
        $connection = new mysqli($this->dbservername,$this->dbusername, $this->dbpassword, $this->dbname);
        if ($connection->connect_error){
            echo "connection failed " . $connection->connect_error . "<br>";
        }
        else {
            return $connection;
        }
    }
    
    
    
}