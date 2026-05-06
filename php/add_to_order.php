<?php
session_start();
include 'connect_to_db.php';

// check login
if (!isset($_SESSION['UserID'])) {
    header("Location: ../Log in.php");
    exit();
}

$userID = $_SESSION['UserID'];
$productID = $_POST['productID'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];
$payment_status = $_POST['payment_status'];

// optional: default date
$date = date("Y-m-d");

// insert order
$sql = "INSERT INTO ordertbl (userID, productID, quantity, date, status, payment_status) 
        VALUES ($userID, $productID, $quantity, '$date', '$status', '$payment_status')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Product Details.php?id=$productID&order=success");
} else {
    header("Location: ../Product Details.php?id=$productID&order=error");
}

exit();
?>