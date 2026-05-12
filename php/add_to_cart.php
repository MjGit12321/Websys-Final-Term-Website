<?php
session_start();
include 'connect_to_db.php';

if (!isset($_SESSION['UserID'])) {
    echo "not_logged_in";
    exit();
}

$userID = $_SESSION['UserID'];
$productID = (int)$_POST['product_id'];
$quantity = (int)$_POST['quantity'];

if ($quantity < 1) {
    echo "invalid_quantity";
    exit();
}

$stock_check = "SELECT stock FROM producttbl WHERE productID = $productID LIMIT 1";
$stock_result = mysqli_query($conn, $stock_check);

if (!$stock_result || mysqli_num_rows($stock_result) === 0) {
    echo "error";
    exit();
}

$product = mysqli_fetch_assoc($stock_result);

if ((int)$product['stock'] <= 0) {
    echo "no_stock";
    exit();
}

if ($quantity > (int)$product['stock']) {
    echo "no_stock";
    exit();
}

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
