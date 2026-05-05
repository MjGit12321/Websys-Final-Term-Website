<?php
include 'connect_to_db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];


if ($password !== $confirm_password) {
    echo "Passwords do not match!";
    exit();
}

$sql = "INSERT INTO usertbl (Username, Password, Name, Gender, Birthdate, Email, Phone_Number, Address) VALUES ('$username', '$password', '$name', '$gender', '$birthdate', '$email', '$phone', '$address')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Log in.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>