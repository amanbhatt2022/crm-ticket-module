<?php
session_start();
include '../config/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// REGISTER USER
if (isset($_POST['register'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../views/auth/login.php?success=1");
        exit();
    } else {
        header("Location: ../views/auth/register.php?error=1");
        exit();
    }
}

// LOGIN USER
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../views/dashboard.php");
        exit();
    } else {
        header("Location: ../views/auth/login.php?error=1");
        exit();
    }
}

// LOGOUT USER
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../views/auth/login.php");
    exit();
}
