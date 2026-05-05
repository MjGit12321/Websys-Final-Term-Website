<?php
include 'connect_to_db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usertbl WHERE Username='$username' AND Password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $row = mysqli_fetch_assoc($result);

    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['Name'] = $row['Name'];

    header("Location: ../Dashboard.php");
} else {
    echo "Invalid username or password";
}
?>