<?php
include 'connect_to_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../Log in.php");
    exit();
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: ../Log in.php?status=error&msg=Please enter username and password");
    exit();
}

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM usertbl WHERE Username='$username' AND Password='$password' LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['is_banned'] == 1) {
        header("Location: ../Log in.php?status=error&msg=Account disabled.");
        exit();
    }

    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['Name'] = $row['Name'];
    $_SESSION['role'] = strtolower(trim($row['role']));

    if ($_SESSION['role'] === 'admin') {
        header("Location: ../Log in.php?status=success&msg=Successfully Login&role=admin");
    } else {
        header("Location: ../Log in.php?status=success&msg=Successfully Login&role=user");
    }
    exit();
} else {
    header("Location: ../Log in.php?status=error&msg=Invalid username or password");
    exit();
}
?>
