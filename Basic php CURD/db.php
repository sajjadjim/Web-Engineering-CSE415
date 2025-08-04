<?php
$servername = "localhost";
$password = "";
$username = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn-> connect_error){
    die('Connection failed :' . $conn->connect_error);
}
?>