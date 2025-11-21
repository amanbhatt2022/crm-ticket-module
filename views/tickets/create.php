<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Create Ticket</h2>

<form action="../../controller/TicketController.php" method="POST" enctype="multipart/form-data">



    <label>Name</label>
    <input type="text" name="name" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Status</label>
    <select name="status">
        <option value="pending">Pending</option>
        <option value="inprogress">In Progress</option>
        <option value="completed">Completed</option>
        <option value="onhold">On Hold</option>
    </select>

    <label>File Upload</label>
    <input type="file" name="file">

    <button type="submit" name="ticket">Create Ticket</button>
</form>

<a href="list.php">Back to My Tickets</a>
