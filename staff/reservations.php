<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'staff') { header('Location: ../index.php'); }
$reservations = $conn->query("SELECT r.*, u.name, n.floor, n.section, n.number FROM reservations r JOIN users u ON r.user_id = u.id JOIN niches n ON r.niche_id = n.id");
?>
<h2>Reservations</h2>
<table border='1'><tr><th>ID</th><th>Family</th><th>Niche</th><th>Payment Status</th></tr>
<?php while($row = $reservations->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td>Floor <?php echo $row['floor'] . ' ' . $row['section'] . '-' . $row['number']; ?></td>
<td><?php echo $row['payment_status']; ?></td>
</tr>
<?php } ?></table>
