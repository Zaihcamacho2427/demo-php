<?php
require_once 'header.php';
/*
if (isset($_GET)){
$id = ($_GET['id']);
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$username = $_GET['username'];
$user_role = $_GET['Role'];
$password = $_GET['password'];
}
else{
    echo "Nothing came back.<br>";
}
*/
echo "Username: " . $_POST[username];
echo "<br>";

$db = new Database();
$connection = $db->getConnection();
    
    $sql_statement = "UPDATE USERS SET FIRST_NAME= '$_GET[firstname]', LAST_NAME= '$_GET[lastname]', USER_NAME= '$_GET[username]', ROLE= '$_GET[Role]', PASSWORD = '$_GET[password]' WHERE ID = '$_GET[id]'";
    $result = mysqli_query($connection, $sql_statement);
    
    if ($result) {
        
        //echo mysqli_affected_rows($connection);
        
        echo '<h2>Update User Data Successful!</h2>';
        echo 'User data updated successfully!<br>';
        echo 'Click <a href="showUserAdminPage.php">here</a> to return.';
    } else {
        echo 'Error in the sql ' . mysqli_error($connection);
    
}



?>