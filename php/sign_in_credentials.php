<?php
include 'connect_to_db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "Passwords do not match!";
    exit();
}

$sql = "INSERT INTO usertbl (Username, Password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Log in.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>