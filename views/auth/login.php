<?php
// Start session if needed
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - CRM Ticket Module</title>
</head>
<body>

<h2>Login</h2>

<form action="../../controller/authcontroller.php" method="POST">
    <input type="email" name="email" placeholder="Enter Email" required><br><br>
    <input type="password" name="password" placeholder="Enter Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>

<br>
<a href="register.php">Don't have an account? Register</a>

</body>
</html>

