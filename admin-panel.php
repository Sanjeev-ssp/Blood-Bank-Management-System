<?php
session_start();

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Access denied'); window.location.href='../admin-login.html';</script>";
    exit;
}
?>
