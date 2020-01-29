<?php
require_once 'header.php';
require_once 'userBusinessService.php';


$id = $_GET['id'];

$bs = new userBusinessService();


$success = $bs->deleteID($id);

if ($success){
    echo "ID user " . $id . " was deleted<br>";
}
else{
    echo "Nothing was deleted<br>";
}