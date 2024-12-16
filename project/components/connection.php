<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23189640";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
