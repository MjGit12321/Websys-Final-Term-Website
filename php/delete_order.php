<?php
session_start();
include 'connect_to_db.php';

$orderID = $_POST['orderID'];

$sql = "DELETE FROM ordertbl WHERE orderID = $orderID";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Orders.php?delete=success");
} else {
    header("Location: ../Orders.php?delete=error");
}

exit();
?>