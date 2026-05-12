<?php
session_start();
include 'connect_to_db.php';

// 1. Security Check: Only admins should be able to run this script
// if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
//     die("Unauthorized access.");
// }

// 2. Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for safety

    // 3. Update the is_banned status to 1
    $sql = "UPDATE usertbl SET is_banned = 1 WHERE userID = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back with a success message
        header("Location: ../Admin Dashboard.php?status=success&msg=User Successfully Banned!");
    } else {
        // Redirect back with an error message
        header("Location: ../Admin Dashboard.php?status=error&msg=Something went wrong!");
    }
} else {
    header("Location: ../Admin Dashboard.php");
}
exit();
?>