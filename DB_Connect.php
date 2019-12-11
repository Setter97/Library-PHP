<?php 
$servername = "localhost";
$username = "Getter";
$password = "GetterSetter12.";
$dbname="library";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
