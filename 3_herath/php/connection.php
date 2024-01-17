<?php
//Created by Sahan Herath IT21334924

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "textile_and_garment_management_system";


// Create connections
$con = mysqli_connect($servername, $username, $password,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

