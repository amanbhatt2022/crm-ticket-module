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

<h2>Ticket Details</h2>
<p><strong>Name:</strong> <?php echo $ticket['name']; ?></p>
<p><strong>Description:</strong> <?php echo $ticket['description']; ?></p>
<p><strong>Status:</strong> <?php echo $ticket['status']; ?></p>
<p><strong>File:</strong> 
<?php if($ticket['file']) { ?>
    <a href="../uploads/<?php echo $ticket['file']; ?>" target="_blank">View File</a>
<?php } ?></p>

<a href="list.php">Back to My Tickets</a>
