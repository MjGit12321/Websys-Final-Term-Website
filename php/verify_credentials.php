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

    header("Location: ../Log in.php?status=success&msg=Login successful");
} else {
    header("Location: ../Log in.php?status=error&msg=Invalid username or password");
}
?>