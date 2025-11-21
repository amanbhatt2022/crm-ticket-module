<?php
$host = "localhost";
$db   = "crm_tickets"; // Your database name
$user = "root";       // Default WAMP MySQL username
$pass = "";           // Default WAMP MySQL password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Database connected successfully"; // Optional test
?>
