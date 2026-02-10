<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('staff');
include('../includes/header.php');

$reservations = $conn->query("
    SELECT r.id, u.name AS family_name, n.floor, n.section, n.number, r.payment_status, r.expires_at
    FROM reservations r
    JOIN users u ON r.user_id = u.id
    JOIN niches n ON r.niche_id = n.id
    ORDER BY r.expires_at ASC
");
?>

<h2>Reservations Management</h2>
<table border="1">
<tr>
<th>ID</th><th>Family</th><th>Niche</th><th>Payment Status</th><th>Expires At</th><th>Actions</th>
</tr>
<?php while($row = $reservations->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['family_name']; ?></td>
<td>Floor <?php echo $row['floor'] . ' ' . $row['section'] . '-' . $row['number']; ?></td>
<td><?php echo ucfirst($row['payment_status']); ?></td>
<td><?php echo $row['expires_at']; ?></td>
<td>
<a href="update_niche_status.php?niche_id=<?php echo $row['id']; ?>">Update Status</a>
</td>
</tr>
<?php } ?>
</table>

<?php include('../includes/footer.php'); ?>
