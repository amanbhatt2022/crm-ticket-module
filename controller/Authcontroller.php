<?php
session_start();
include('../config/database.php'); // database connection

// LOGIN
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            header("Location: ../views/dashboard.php");
            exit();

        } else {
            echo "Invalid Password!";
        }

    } else {
        echo "Email not found!";
    }
}
?>
