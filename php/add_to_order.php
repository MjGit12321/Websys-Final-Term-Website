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
$sql = "INSERT INTO ordertbl (userID, productID, quantity, date_ordered, status, payment_status) 
        VALUES ($userID, $productID, $quantity, '$date', '$status', '$payment_status')";

// 2. CHECK IF THIS CAME FROM THE CART
if (isset($_POST['from_cart']) && $_POST['from_cart'] == 'true') {
    $cartID = intval($_POST['cartID']);
    
    // Delete the record from the cart table
    $delete_sql = "DELETE FROM carttbl WHERE cartID = $cartID";
    
    mysqli_query($conn, $delete_sql);
}

if (mysqli_query($conn, $sql)) {
    header("Location: ../Product Details.php?id=$productID&order=success");
} else {
    header("Location: ../Product Details.php?id=$productID&order=error");
}

exit();
?>