<?php 
$servername = "localhost";
$username = "Getter";
$password = "GetterSetter12.";
$dbname="library";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);









$sql="select count(*) as total from author WHERE name='Super Autor'";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>