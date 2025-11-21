<?php
session_start();

// User not logged in → send to login
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>

<p>You are successfully logged in.</p>

<a href="tickets/create.php">Create Ticket</a><br><br>
<a href="tickets/list.php">My Tickets</a><br><br>

<a href="../controller/logout.php">Logout</a>

</body>
</html>
