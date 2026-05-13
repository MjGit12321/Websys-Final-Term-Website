<?php
include 'connect_to_db.php';

// 1. Collect and trim data (removes accidental spaces)
$username = trim($_POST['username']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$name = trim($_POST['name']);
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);

/* 2. CHECK FOR NULL/EMPTY VALUES */
// We put all required fields into an array to check them at once
$required_fields = [$username, $password, $name, $gender, $birthdate, $email, $phone, $address];

foreach ($required_fields as $field) {
    if (empty($field)) {
        header("Location: ../Sign in.php?status=error&msg=Please fill all the fields");
        exit();
    }
}

if (!preg_match('/@gmail\.com$/i', $email)) {
    header("Location: ../Sign in.php?status=error&msg=Email must end with @gmail.com");
    exit();
}

if (!ctype_digit($phone)) {
    header("Location: ../Sign in.php?status=error&msg=Phone number must contain numbers only");
    exit();
}

// 3. Password Match Check
if ($password !== $confirm_password) {
    die("Passwords do not match!");
}

/* 4. SECURITY FIX: ESCAPE STRINGS */
// This prevents SQL Injection (special characters breaking your query)
$username = mysqli_real_escape_string($conn, $username);
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$address = mysqli_real_escape_string($conn, $address);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Check if the email or username already exists
    $check_sql = "SELECT * FROM usertbl WHERE Password = '$password' and Username = '$username'";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        // 2. If a record is found, stop the process
        header("Location: ../Sign in.php?status=error&msg=Error account already exists!");
        exit();
    } else {
        // 3. If no record found, proceed with registration
        /* 5. INSERT DATA */
        $sql = "INSERT INTO usertbl (Username, Password, Name, Gender, Birthdate, Email, Phone_Number, Address) 
                VALUES ('$username', '$password', '$name', '$gender', '$birthdate', '$email', '$phone', '$address')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../Sign in.php?status=success&msg=Successfully Signed In!");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
            }
        }

?>
