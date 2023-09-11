<?php
$servername = "localhost";
$username = "viet";
$password = "viet";
$dbname = "info_user";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>