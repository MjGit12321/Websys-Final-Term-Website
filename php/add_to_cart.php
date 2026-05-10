<?php
session_start();
include 'connect_to_db.php';

if (!isset($_SESSION['UserID'])) {
    echo "not_logged_in";
    exit();
}

$userID = $_SESSION['UserID'];
$productID = $_POST['product_id'];
$quantity = $_POST['quantity'];

// check if already in cart
$check = "SELECT * FROM carttbl WHERE userID = $userID AND productID = $productID";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    // update quantity
    $sql = "UPDATE carttbl 
            SET quantity = quantity + $quantity 
            WHERE userID = $userID AND productID = $productID";
} else {
    // insert new
    $sql = "INSERT INTO carttbl (userID, productID, quantity) 
            VALUES ($userID, $productID, $quantity)";
}

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
?>