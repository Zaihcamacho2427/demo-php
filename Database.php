<?php
class Database{
    
    
    private $dbservername = "k2fqe1if4c7uowsh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $dbusername = "tv8hy5xvcsed77v3";
    private $dbpassword = "h5f7psinzlm7xglc";
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
