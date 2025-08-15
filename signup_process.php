<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'User with this email already exists!';
        header('Location: signup.php');
        exit();
    }

    // Insert the new user into the database
    $query = "INSERT INTO users (name, email, password) VALUES ('$fullName', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = 'Registration successful! You can now login.';
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['error'] = 'Registration failed! Please try again.';
        header('Location: signup.php');
        exit();
    }
}
?>