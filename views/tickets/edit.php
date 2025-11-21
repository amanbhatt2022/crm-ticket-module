<?php
session_start();
include('../config/database.php');

if (!isset($_GET['id'])) {
    header("Location: list.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM tickets WHERE id = $id";
$result = mysqli_query($conn, $query);
$ticket = mysqli_fetch_assoc($result);
?>

<h2>Edit Ticket</h2>

<form action="../controller/TicketController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">

    <label>Name</label>
    <input type="text" name="name" value="<?php echo $ticket['name']; ?>" required>

    <label>Description</label>
    <textarea name="description" required><?php echo $ticket['description']; ?></textarea>

    <label>Status</label>
    <select name="status">
        <option value="pending" <?php if($ticket['status']=='pending') echo 'selected'; ?>>Pending</option>
        <option value="inprogress" <?php if($ticket['status']=='inprogress') echo 'selected'; ?>>In Progress</option>
        <option value="completed" <?php if($ticket['status']=='completed') echo 'selected'; ?>>Completed</option>
        <option value="onhold" <?php if($ticket['status']=='onhold') echo 'selected'; ?>>On Hold</option>
    </select>

    <label>File Upload</label>
    <input type="file" name="file">
    <?php if($ticket['file']) { ?>
        <p>Current File: <a href="../uploads/<?php echo $ticket['file']; ?>" target="_blank">View</a></p>
    <?php } ?>

    <button type="submit" name="update_ticket">Update Ticket</button>
</form>

<a href="list.php">Back to My Tickets</a>
