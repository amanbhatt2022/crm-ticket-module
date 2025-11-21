<?php
session_start();
include('../../config/database.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM tickets WHERE created_by = $user_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<h2>My Tickets</h2>
<a href="create.php">Create Ticket</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="show.php?id=<?php echo $row['id']; ?>">View</a> | 
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        </td>
    </tr>
<?php } ?>
</table>
