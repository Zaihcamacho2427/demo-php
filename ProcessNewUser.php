<?php
require_once 'header2.php';
require_once 'userBusinessService.php';
require_once 'Person.php';
//if anything came through involving those 5 criteria points
if (isset($_GET)){
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$username = $_GET['username'];
$role = $_GET['Role'];
$password = $_GET['password'];
}
else{
    echo "Nothing came back.<br>";
}
//create instance of userBusinessService
$bs = new userBusinessService();
//create new fake user
$person = new Person(null, $firstname, $lastname, $username, $role, $password);
//call method to add user using fake user
// echo $bs->addOne($person);
if ($bs->addOne($person)){
    echo "Click <a href='showLoginForm.php'>HERE </a> to login. ";
    echo "User " . $person->getFirst_name() . " inserted.<br>";
    echo "</div>";
}
else{
    echo "<div class='container'>";
    echo '<p>User creation failed. Pleas try again.</p>';
    echo "Click <a href='index.php'>HERE </a> to go to the Home page.";
    echo "</div>";
}
echo "Click here to return to main page <a href='/'>Return to main page</a>";
?>