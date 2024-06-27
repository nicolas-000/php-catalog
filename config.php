<?php
$servername = "database-prueba3.cwvik69dfia7.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "Admin123?";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
