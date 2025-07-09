<?php
session_start();

$admin_username = "admin";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = isset($_POST['admin_user']) ? $_POST['admin_user'] : '';
    $pass = isset($_POST['admin_pass']) ? $_POST['admin_pass'] : '';

    if ($user === $admin_username && $pass === $admin_password) {
        $_SESSION['admin'] = $user;
        header("Location: admin-panel.php");
        exit;
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href='../admin-login.html';</script>";
        exit;
    }
} else {
    echo "Invalid request method.";
    exit;
}
?>
