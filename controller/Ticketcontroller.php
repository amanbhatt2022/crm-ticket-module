<?php
session_start();
include('../config/database.php'); // Include your database connection

if (isset($_POST['create_ticket'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $created_by = $_SESSION['user_id']; // ID of logged-in user
    $filename = null;

    // Handle file upload
    if (!empty($_FILES['file']['name'])) {
        $filename = time() . '_' . $_FILES['file']['name'];
        $target_path = "../uploads/" . $filename;
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
    }

    // Insert ticket into database
    $query = "INSERT INTO tickets (name, description, status, file, created_by, created_at)
              VALUES ('$name', '$description', '$status', '$filename', '$created_by', NOW())";

    if (mysqli_query($conn, $query)) {
        header("Location: ../views/mytickets.php"); // Redirect to tickets list
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
