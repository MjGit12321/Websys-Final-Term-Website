<?php
session_start();
include 'connect_to_db.php';

// 1. Security Check: Only admins should be able to run this script
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Unauthorized access.");
}

// 2. Check if the ID and new ban status are provided in the URL
if (isset($_GET['id'], $_GET['is_banned'])) {
    $id = intval($_GET['id']); // Convert to integer for safety
    $is_banned = intval($_GET['is_banned']) === 1 ? 1 : 0;

    // 3. Update the is_banned status
    $sql = "UPDATE usertbl SET is_banned = $is_banned WHERE userID = $id";
    $message = $is_banned === 1 ? "User Successfully Disabled!" : "User Successfully Enabled!";

    if (mysqli_query($conn, $sql)) {
        // Redirect back with a success message
        header("Location: ../Admin Dashboard.php?status=success&msg=$message");
    } else {
        // Redirect back with an error message
        header("Location: ../Admin Dashboard.php?status=error&msg=Something went wrong!");
    }
} else {
    header("Location: ../Admin Dashboard.php");
}
exit();
?>
