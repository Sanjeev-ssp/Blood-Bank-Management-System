<?php
include 'db.php'; // include database connection

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check credentials
    $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Login successful!'); window.location.href='../index.html';</script>";
    } else {
        echo "<script>alert('Invalid credentials!'); window.location.href='../login.html';</script>";
    }

    $conn->close();
} else {
    echo "Invalid Request Method.";
}
?>
