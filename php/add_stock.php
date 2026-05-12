<?php
session_start();
include 'connect_to_db.php';

// Security: Only admins can restock
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied.");
}

if (isset($_POST['submit'])) {
    // 1. Get and sanitize inputs
    $pID = intval($_POST['productID']);
    $add_qty = intval($_POST['quantity']);

    // 2. The Update Query: Adds the new amount to the existing stock
    $sql = "UPDATE producttbl SET stock = stock + $add_qty WHERE productID = $pID";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the inventory page with success
        header("Location: ../Admin Dashboard.php?status=success&msg=Stock successfully updated!");
    } else {
        // Redirect with error message
        header("Location: ../Admin Dashboard.php?status=error&msg=" . mysqli_error($conn));
    }
} else {
    header("Location: ../Admin Dashboard.php");
}
exit();
?>