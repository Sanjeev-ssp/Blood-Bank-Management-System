<?php
$servername = "localhost";
$username = "root";
$password = ""; // default password in XAMPP
$dbname = "bloodbank"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
