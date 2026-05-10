<?php
session_start();
include 'connect_to_db.php';

$cartID = $_POST['cartID'];

$sql = "DELETE FROM carttbl WHERE cartID = $cartID";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Carts.php?delete=success");
} else {
    header("Location: ../Carts.php?delete=error");
}

exit();
?>