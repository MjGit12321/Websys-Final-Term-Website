<?php
session_start();
include 'connect_to_db.php';

$userID = $_SESSION['UserID'];
$orderID = $_POST['orderID'];

$update_stats = "UPDATE usertbl 
                 SET Cancelled_Orders = Cancelled_Orders + 1
                 WHERE userID = $userID";

mysqli_query($conn, $update_stats);

$sql = "DELETE FROM ordertbl WHERE orderID = $orderID";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Orders.php?delete=success");
} else {
    header("Location: ../Orders.php?delete=error");
}

exit();
?>